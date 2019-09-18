<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {

        
        if($request->mitra_code !== null){
            if($request->session()->get('mitra_code') !== $request->mitra_code){
                $request->session()->put('mitra_code', $request->mitra_code); // continue
            }
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
