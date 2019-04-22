<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowedUserTypes = ['Organizator', 'Admin', 'Użytkownik'];

        if (auth()->guest()) {
            return redirect('/')->with('status', 'Musisz być zalogowany,aby w pełni korzystać z serwisu');
        }

        if (in_array(auth()->user()->funkcja, $allowedUserTypes)) {
            return $next($request);
        }

        return redirect('/')->with('status','Musisz być zalogowany,aby w pełni korzystać z serwisu');
    }
}
