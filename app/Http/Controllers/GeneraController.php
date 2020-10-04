<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
class GeneraController extends Controller
{
    public function changeLanguage($locale){
try{

    if(array_key_exists($locale,config('locale.languages'))){
        Session::put('Locale',$locale);
        App::setLocale($locale);
        return redirect()->back();
    }
    return redirect()->back();

}catch(\Exception $exception){
    return redirect()->back();
}

    }
}
