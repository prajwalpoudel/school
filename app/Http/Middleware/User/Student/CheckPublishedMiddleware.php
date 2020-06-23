<?php

namespace App\Http\Middleware\User\Student;

use Closure;

class CheckPublishedMiddleware
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
        if(getAuthUser()->is_published)
        {
            return $next($request);
        }
        else
            {
            return redirect()->route('student.index');
        }
    }
}
