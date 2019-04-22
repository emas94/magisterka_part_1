<?php

namespace App\Http\Middleware;

use Closure;

class OrganizerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowedUserTypes = ['Admin','Organizator'];

        if (auth()->guest()) {
            return redirect('home')->with('status_danger', 'Nie masz uprawnień organizatora');
        }

        if (in_array(auth()->user()->funkcja, $allowedUserTypes)) {
            return $next($request);
        }

        return redirect('home')->with('status_danger', 'Nie masz uprawnień organizatora');
    }
}

