<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserVisit;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class TrackUserVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // \Log::info('Cookies: ', );
        echo json_encode($request->cookies->all());die;
        if (Cookie::get('cookie-consent')) {

            // Get user details
            $ipAddress = $request->ip(); // User's IP address
            $userAgent = $request->header('User-Agent'); // Browser and operating system
            $referrer = $request->headers->get('referer'); // Referring URL
            $sessionId = session()->getId(); // Session ID (for identifying users who are browsing)
            $geoLocation = null; // Optional: Use an API to get geolocation based on IP (e.g., ipstack)

            // Insert user visit data into the database
            UserVisit::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'referrer_url' => $referrer,
                'session_id' => $sessionId,
                'geo_location' => $geoLocation,
            ]);
        }

        return $next($request);
    }
}
