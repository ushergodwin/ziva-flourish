<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Ad;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\CompanyInfo;
use App\Models\CoreValue;
use App\Models\MailSubscriber;
use App\Models\Mission;
use App\Models\OpeningHour;
use App\Models\OurImpact;
use App\Models\Partner;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Vision;
use App\Models\WhyChoosePoint;
use App\Models\WhyChooseUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //

    public function index()
    {
        $aboutUs = About::first();
        $ads = Ad::where('is_active', true)->get();
        $company = CompanyInfo::first();
        $services = home_page_services();
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $blogPosts = BlogPost::with('stats')->where('is_published', true)->orderBy('created_at', 'desc')->limit(2)->get();
        $partners = Partner::where('is_active', true)->get();
        $openingHours = OpeningHour::all();
        $whyChoosePoints = WhyChoosePoint::where('is_active', true)->get();
        $whyChooseUs = WhyChooseUs::first();
        $ourImpact = OurImpact::first();

        return view('ziva.index', [
            'aboutUs' => $aboutUs,
            'ads' => $ads,
            'company' => $company,
            'services' => $services,
            'testimonials' => $testimonials,
            'blogPosts' => $blogPosts,
            'partners' => $partners,
            'openingHours' => $openingHours,
            'whyChoosePoints' => $whyChoosePoints,
            'whyChooseUs' => $whyChooseUs,
            'ourImpact' => $ourImpact,
        ]);
    }

    public function subscribe(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email',
                'name' => 'nullable|string|max:255',
            ]);

            $subscriberExists = MailSubscriber::where('email', $validated['email'])->exists();
            if ($subscriberExists) {
                return response()->json([
                    'message' => 'You are already subscribed.',
                    'success' => false,
                ], 202);
            }
            MailSubscriber::create([
                'email' => $validated['email'],
                'name' => $validated['name'] ?? null,
            ]);

            return response()->json([
                'message' => 'Subscription successful! Thank you for subscribing.',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            Log::error('Subscription error: ' . $e->getMessage(), [
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'timestamp' => Carbon::now()->toDateTimeString(),
            ]);
            return response()->json([
                'message' => 'Subscription failed. Please try again later.',
                'success' => false,
            ], 202);
        }
    }

    public function about()
    {
        $aboutUs = About::first();
        $company = CompanyInfo::first();
        $services = Service::where('is_active', true)->limit(3)->get();
        $openingHours = OpeningHour::all();
        $whyChoosePoints = WhyChoosePoint::where('is_active', true)->get();
        $whyChooseUs = WhyChooseUs::first();
        $vision = Vision::first();
        $mission = Mission::first();
        $teamMembers = TeamMember::where('is_active', true)->get();
        $coreValues = CoreValue::where('is_active', true)->get();
        return view('ziva.about-us', [
            'aboutUs' => $aboutUs,
            'company' => $company,
            'services' => $services,
            'openingHours' => $openingHours,
            'whyChoosePoints' => $whyChoosePoints,
            'whyChooseUs' => $whyChooseUs,
            'vision' => $vision,
            'mission' => $mission,
            'teamMembers' => $teamMembers,
            'coreValues' => $coreValues,
        ]);
    }

    public function contact()
    {
        $company = CompanyInfo::first();
        $openingHours = OpeningHour::all();

        return view('ziva.contact-us', [
            'company' => $company,
            'openingHours' => $openingHours,
        ]);
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        $company = CompanyInfo::first();
        $openingHours = OpeningHour::all();
        return view('ziva.services', [
            'services' => $services,
            'company' => $company,
            'openingHours' => $openingHours,
        ]);
    }

    public function blog(Request $request)
    {
        $query = strip_tags($request->query('q'));
        $blogPosts = BlogPost::with('stats')
            ->with('comments')
            ->when($query, function ($q) use ($query) {
                return $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            })
            ->where('is_published', true)->orderBy('created_at', 'desc')->paginate(12);
        $company = CompanyInfo::first();
        $openingHours = OpeningHour::all();

        return view('ziva.blog', [
            'blogPosts' => $blogPosts,
            'company' => $company,
            'openingHours' => $openingHours,
        ]);
    }

    public function blogPost($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        // increment the view count
        $blogPost->stats()->increment('views');

        $blogPost = BlogPost::with(['stats', 'comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->where('slug', $slug)->firstOrFail();
        $company = CompanyInfo::first();
        $openingHours = OpeningHour::all();
        // get each category's count of posts
        $blogCategoryCounts = BlogCategory::withCount('blogPosts')->get()->keyBy('id');
        $recentPosts = BlogPost::with('stats')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('ziva.blog-post', [
            'blog' => $blogPost,
            'company' => $company,
            'openingHours' => $openingHours,
            'blogCategoryCounts' => $blogCategoryCounts,
            'recentPosts' => $recentPosts,
        ]);
    }
}