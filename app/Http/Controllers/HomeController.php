<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
    	if(auth()->check())
    	{
    		if(auth()->user()->is_admin)
            {
                return View('admin');
            }
            else
            {
                return redirect()->route('home')->with('error','Vous-dévez être administrateur pour pouvoir accédé à cette page. Merci');
            }
    	}
    	else
    	{
    		return redirect()->route('login')->with('error','Vous dévez être connecté pour voir cette page !');
    	}
    }
}
