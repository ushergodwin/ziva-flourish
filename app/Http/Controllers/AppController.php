<?php

namespace App\Http\Controllers;

use App\Mail\BookingRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;
use App\Models\BlogComment;
use App\Models\BlogPost;
use App\Models\BlogPostStat;
use App\Models\Booking;
use App\Models\Inquiry;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppController extends Controller
{


    public function submitContact(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:100',
                'message' => 'nullable|string|max:1000',
            ]);

            $inquiry = new Inquiry($validated);
            $inquiry->save();
            // Send email
            Mail::to(config('mail.to.address'))->send(new ContactUsMail($validated));
            return response()->json(['message' => 'Message sent successfully', 'success' => true]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('Contact submission error: ' . $th->getMessage());
            return response()->json([
                'message' => 'An error occurred while sending your message. Please try again later.',
                'success' => false,
            ], 500);
        }
    }

    public function bookService(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'phone' => 'required|string|max:20',
                'service_id' => 'required|integer|exists:services,id',
                'preferred_date' => 'required|date',
                'notes' => 'nullable|string|max:500',
                'service_name' => 'nullable|string|max:100',
                'preferred_time' => 'string|max:10',
                'number_of_people' => 'nullable|integer|min:1|max:100',
            ]);

            $data = $validated;

            $preferred_date_time = $data['preferred_date'] . ' ' . ($data['preferred_time'] ?? '00:00:00');


            // extract date and time 
            $data['preferred_date'] = Carbon::parse($preferred_date_time)->format('Y-m-d');
            $data['preferred_time'] = Carbon::parse($preferred_date_time)->format('H:i:s');
            $data['status'] = 'pending';

            unset($data['service_name']);
            unset($data['preferred_time']);
            unset($data['number_of_people']);
            DB::beginTransaction();
            $booking = new Booking($data);
            $booking->save();

            // Send booking request email
            $mailable = new BookingRequestMail($validated);
            Mail::to(config('mail.to.address'), null)->send($mailable);
            DB::commit();
            return response()->json(['message' => 'Booking request received', 'success' => true]);
        } catch (\Throwable $th) {
            //throw $th;
            Log::error('Booking request error: ' . $th->getMessage(), [
                'trace' => $th->getTraceAsString(),
            ]);
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while processing your booking request. Please try again later.',
                'success' => false,
            ], 500);
        }
    }

    public function saveBlogComment(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'comment' => 'required|string|max:1000',
                'blog_post_id' => 'required|integer|exists:blog_posts,id',
            ]);

            $comment = new BlogComment($validated);
            $comment->save();

            // increment the comment count for the blog post in BlogPostStat
            $blogPostStat = BlogPostStat::where('blog_post_id', $validated['blog_post_id'])->first();
            if ($blogPostStat) {
                $blogPostStat->increment('comments');
            } else {
                // If no stats exist, create a new one
                BlogPostStat::create([
                    'blog_post_id' => $validated['blog_post_id'],
                    'comments' => 1,
                ]);
            }

            return response()->json(['message' => 'Comment submitted successfully', 'success' => true]);
        } catch (\Throwable $th) {
            Log::error('Blog comment submission error: ' . $th->getMessage());
            return response()->json([
                'message' => 'An error occurred while submitting your comment. Please try again later.',
                'success' => false,
            ], 500);
        }
    }

    public function likeBlogPost(Request $request)
    {
        try {
            $validated = $request->validate([
                'blog_post_id' => 'required|integer|exists:blog_posts,id',
            ]);

            // cache the user's IP address or user ID to prevent multiple likes
            $userIdentifier = $request->ip(); // or use auth()->id() for authenticated users
            $cacheKey = 'blog_post_like_' . $validated['blog_post_id'] . '_' . $userIdentifier;

            $blogPostStat = BlogPostStat::where('blog_post_id', $validated['blog_post_id'])->first();

            if (cache()->has($cacheKey)) {
                // decrement the like count if the user has already liked this post
                if ($blogPostStat) {
                    $blogPostStat->decrement('likes');
                } else {
                    // If no stats exist, create a new one with likes set to 0
                    BlogPostStat::create([
                        'blog_post_id' => $validated['blog_post_id'],
                        'likes' => 0,
                    ]);
                }
                cache()->forget($cacheKey); // Remove the cache entry
                return response()->json([
                    'message' => 'Like removed successfully',
                    'success' => true,
                    'removed_like' => true
                ], 203);
            }

            // Proceed to like the blog post
            cache()->put($cacheKey, true, 60 * 60 * 24); // Cache for 24 hours

            if ($blogPostStat) {
                $blogPostStat->increment('likes');
            } else {
                // If no stats exist, create a new one
                BlogPostStat::create([
                    'blog_post_id' => $validated['blog_post_id'],
                    'likes' => 1,
                ]);
            }

            return response()->json(['message' => 'Blog post liked successfully', 'success' => true, 'removed_like' => false]);
        } catch (\Throwable $th) {
            Log::error('Blog post like error: ' . $th->getMessage());
            return response()->json([
                'message' => 'An error occurred while liking the blog post. Please try again later.',
                'success' => false,
                'removed_like' => false
            ], 500);
        }
    }
}
