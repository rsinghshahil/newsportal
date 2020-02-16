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
        $headerNews = News::orderBy('id', 'desc')->take(2)->get();
        return view('front.index',compact('headerNews'));

    }
    public function sports(){
        $news = DB::table('news')
                ->select('*',DB::raw('date(created_at) as created_at'))
                ->orderBy('id', 'desc')
                ->paginate(10);
                // DD($news);
        return view('front.pages.sports',compact('news'))
            ->with('i', 0);
        
    }
    public function politics(){
        return view('front.pages.politics');
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
