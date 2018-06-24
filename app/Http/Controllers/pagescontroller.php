<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class pagescontroller extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }
       
     public function index(){
        $title='Welcom My College';
        return view('pages.index')->with('title', $title);
        
    }
     public function school(){
             
          return view('pages.school');
           
     }
     public function Administration(){
         if (Auth::user()->role == "manager" || Auth::user()->role == "owner") {
             return view('pages.Administration');
        } else {
            return view('pages.school');
        }
             
     }
}
