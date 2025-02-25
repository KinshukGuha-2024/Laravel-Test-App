<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\AccessInformation;
use App\Models\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class TrackLocation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $agent = new Agent();
        $currentDate = Carbon::today(); 
        $local_ips = [
            'localhost',            
            '127.0.0.1',            
            '192.168.0.0',          
            '192.168.0.90'
        ];
        $ipAddress = $request->ip();
        if(in_array($ipAddress, $local_ips)) {
            $ipAddress = '122.176.97.157';
        }
        $existingRecord = AccessInformation::where('ip_address', $ipAddress)
                                            ->whereDate('created_at', $currentDate)
                                            ->exists();
        $position = Location::get($ipAddress);
        if ($position) {
            $latitude = $position->latitude;  
            $longitude = $position->longitude; 
            $city = $position->cityName;  
            $zipcode = $position->zipCode;
            $country = $position->countryName; 
            $timezone = $position->timezone;  
            $state = $position->regionName;
        } else {
            $latitude = '22.5643';  
            $longitude = '88.3693';  
            $city = 'Kolkata';  
            $zipcode = '700001';
            $country = 'Kolkata'; 
            $timezone = 'Asia/Kolkata';  
            $state = 'West Bengal';
        }

        if (!$existingRecord) {
            AccessInformation::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'device_type' => $agent->device(),
                'browser' => $agent->browser(),
                'os' => $agent->platform(),
                'ip_address' => $ipAddress,
                'country' => $country,
                'city' => $city,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'zipcode' => $zipcode,
                'timezone' => $timezone,
                'state' => $state,
                'visited_url' => $request->fullUrl(),
                'referrer_url' => $request->headers->get('referer'),
                'visited_at' => now(),
            ]);
            Notifications::create([
                "type" => "new_user"
            ]);
            
        }
        return $next($request);
    }
}
