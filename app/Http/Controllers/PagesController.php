<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
      return view('welcome');
    }
    public function index(){
      $title= 'welcome to this Blog!!';
      return view('pages.index')->with('title',$title);
    }
    public function about(){
      return view('pages.about');
    }
    public function services(){
      return view('pages.services');
    }
}
