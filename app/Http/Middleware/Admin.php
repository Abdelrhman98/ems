<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
      if(isset(auth()->user()->auth)){
          if(auth()->user()->auth == 'admin')
        return $next($request);
      }
      return redirect('')->with('error','Permission Denied!!! You do not have administrative access.');
    }
}
