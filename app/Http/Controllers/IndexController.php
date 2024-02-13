<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use App\Models\Car;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function home(){
      $cars=Car::where('active', 1)->orderBy('created_at', 'desc')->take(6)->get();
      $testimonial=Testimonial::where('published', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('testimonial','cars')); 
          }
          
    public function listing(){
      $testimonial=Testimonial::where('published', 1)->get();
      $cars=Car::paginate(6);
        return view('listing', compact('testimonial','cars')); 
              }
    public function testimonial(){
      $testimonial=Testimonial::get();
      return view('testimonial', compact('testimonial')); 
                      }

public function blog(){
        return view('blog'); 
                      }

public function about(){
      return  view('about'); 
                }

}
