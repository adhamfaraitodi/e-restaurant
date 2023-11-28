<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerSessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->exists('nameCus'))
            if ($request->session()->exists('idMeja'))
                if($request->session()->get('idMeja') == $request->route()->parameter('meja'))
                    return $next($request);
        return redirect()->route('pesan.show',$request->route()->parameter('meja')); // <- parameters here
    }
}