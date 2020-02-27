<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use DB;
use File;
use App\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->take(2)->get();
        // dd($news);
        return view('front.index');

    }
    public function sports(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.sports',compact('lNews','sNews'));
        
    }
    public function politics(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.politics',compact('lNews','sNews'));
    }
    public function lifestyle(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.lifestyle',compact('lNews','sNews'));
    }
    public function technology(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.technology',compact('lNews','sNews'));
    }
    public function international(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.international',compact('lNews','sNews'));
    }
    public function entertainment(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.entertainment',compact('lNews','sNews'));
    }
    public function blog(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.blog',compact('lNews','sNews'));
    }
    public function health(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.health',compact('lNews','sNews'));
    }
    public function business(){
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))
        ->take(4)->get();
        // dd($lNews[3]->id);
        $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->limit(6)->get();
        return view('front.pages.business',compact('lNews','sNews'));
    }
    public function contact(){
        return view('front.contact');
    }
    public function about(){
        return view('front.about');
    }
    public function getHeaderNews(){

        $news = News::orderBy('id', 'desc')->take(2)->get();
        return view('partials.header-banners',compact('news'));
    }
}
