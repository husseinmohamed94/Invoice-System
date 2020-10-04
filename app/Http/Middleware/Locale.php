<?php

namespace App\Http\Middleware;

use Closure;
use carbon\carbon;
use Session;
use App;
 class Locale
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

        if(config('locale.status')){
            if(Session::has('Locale') && array_key_exists(Session::get('Locale'),config('locale.languages'))){
                App::setLocale(Session::get('Locale'));
            }else{
                $userlanguages = preg_split('/[,;]/',$request->server('HTTP_ACCEPT_LANGUAGE'));
                foreach($userlanguages as $language){
                    if(array_key_exists($language,config('locale.languages'))){
                        App::setLocale($language);

                        setLocale(LC_TIME,config('locale.languages')[$language][2]);
                        carbon::setLocale(config('locale.languages')[$language][0]);
                        if(config('locale.languages')[$language][2]){
                            \session(['lang-rtl'=>true]);
                        }else{
                           Session::forget('lang-rtl');
                        }
                    break;
                    }
                }

            }
        }
        return $next($request);
    }
}
