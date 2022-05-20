<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Profilesetup
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
        $response = $next($request);
        $auth = Auth::user();
        

        if(!$auth->status || !$auth->sex || !$auth->age || !$auth->position || !$auth->work_title || !$auth->work_length || !$auth->hotel_type || !$auth->area || !$auth->hotel_worker_num || !$auth->hotel_adr) {
            
            return redirect('/profile/edit')->with('profilesetup',true);
        }

        return $response;
    }
}
