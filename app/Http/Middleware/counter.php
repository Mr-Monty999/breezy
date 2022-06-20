<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class counter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (!Cookie::has("v-site")) {
            cookie::queue("v-site", true, 9999999, "/");
            $data = Setting::first();
            if ($data != null) {
                $data->vistors_count += 1;
                $data->save();
            } else {
                Setting::create([
                    "vistors_count" => 1
                ]);
            }
        }

        return $next($request);
    }
}
