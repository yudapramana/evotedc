<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class Language
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
        if(!session('lang')) {
            $defaultLang = \App\Model\Language::first();
            session()->put('lang', $defaultLang);
        }
        $lang = session('lang');
        App::setlocale($lang->locale);
        return $next($request);
    }
}
