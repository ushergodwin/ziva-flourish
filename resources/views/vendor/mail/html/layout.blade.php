<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f4f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f4f4f7;
            padding: 40px 0;
        }

        .email-content {
            max-width: 600px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .email-header {
            background-color: #25D366;
            color: white;
            text-align: center;
            padding: 24px;
        }

        .email-header img {
            max-height: 50px;
            margin-bottom: 10px;
        }

        .email-body {
            padding: 32px;
        }

        .email-footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            padding: 24px;
        }

        .email-footer a {
            color: #25D366;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <img src="{{ asset('ziva-logo.png') }}" alt="{{ config('app.name') }}">
                <h2>{{ config('app.name') }}</h2>
            </div>

            <div class="email-body">
                {{ Illuminate\Mail\Markdown::parse($slot) }}
            </div>

            <div class="email-footer">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                <br>
                <a href="{{ config('app.url') }}">{{ config('app.url') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
