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
    {   $count = DB::table('news')->get()->count();
        // dd($count);
        if($count == '0'){
        
            return view('front.index',compact('count'));
        }
        else{
        $popular = News::inRandomOrder()->limit(4)->get();
        $featured = News::inRandomOrder()->limit(2)->get();
        $photos = News::orderBy('id','desc')->take(8)->get();
        return view('front.index',compact('popular','featured','photos','count'));
        }
    }
    public function sports(){
        $posts = DB::table('news')->where('category', '=', 'sports')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.sports',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
        $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'sports')->take($count)->get();
        return view('front.pages.sports',compact('lNews','count'));
        }
        else{
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'sports')->take(4)->get();
            $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'sports')->paginate(6);
            return view('front.pages.Sports',compact('lNews','sNews','count'));
        }

    }

    public function politics(){
        $posts = DB::table('news')->where('category', '=', 'politics')->get();
        $count=$posts->count();
        // dd($count);
        if($count == '0'){
        
            return view('front.pages.sports',compact('count'));
        }
        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'politics')->take($count)->get();
            return view('front.pages.politics',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'politics')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'politics')->paginate(6);
                return view('front.pages.politics',compact('lNews','sNews','count'));
            }
    }

    public function lifestyle(){
        $posts = DB::table('news')->where('category', '=', 'lifestyle')->get();
        $count=$posts->count();
        // dd($count);
        if($count == '0'){
        
            return view('front.pages.sports',compact('count'));
        }
        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'lifestyle')->take($count)->get();
            return view('front.pages.lifestyle',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'lifestyle')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'lifestyle')->paginate(6);
                return view('front.pages.lifestyle',compact('lNews','sNews','count'));
            }
    }

    public function technology(){
        $posts = DB::table('news')->where('category', '=', 'technology')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.technology',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'technology')->take($count)->get();
            return view('front.pages.technology',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'technology')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'technology')->paginate(6);
                return view('front.pages.technology',compact('lNews','sNews','count'));
            }
    }

    public function international(){
        $posts = DB::table('news')->where('category', '=', 'international')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.international',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'international')->take($count)->get();
            return view('front.pages.international',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'international')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'international')->paginate(6);
                return view('front.pages.international',compact('lNews','sNews','count'));
            }
    }

    public function entertainment(){
        $posts = DB::table('news')->where('category', '=', 'entertainment')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.entertainment',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'entertainment')->take($count)->get();
            return view('front.pages.entertainment',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'entertainment')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'entertainment')->paginate(6);
                return view('front.pages.entertainment',compact('lNews','sNews','count'));
            }
    }


    public function health(){
        $posts = DB::table('news')->where('category', '=', 'health')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.health',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'health')->take($count)->get();
            return view('front.pages.sports',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'health')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'health')->paginate(6);
                return view('front.pages.health',compact('lNews','sNews','count'));
            }
    }

    public function business(){
        $posts = DB::table('news')->where('category', '=', 'business')->get();
        $count=$posts->count();
        // dd($count);
        
        if($count == '0'){
        
            return view('front.pages.business',compact('count'));
        }

        elseif($count > '0' and $count < '5' ){
        
            $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'business')->take($count)->get();
            return view('front.pages.business',compact('lNews','count'));
            }
            else{
                $lNews = News::orderBy('id', 'desc')->select('*',DB::raw('date(created_at) as created_at'))->where('category', '=', 'business')->take(4)->get();
                $sNews = News::where('id', '<',$lNews[3]->id )->orderBy('id','desc')->where('category', '=', 'business')->paginate(6);
                return view('front.pages.business',compact('lNews','sNews','count'));
            }
    }

    public function contact(){
        return view('front.contact');
    }

    public function about(){
        return view('front.about');
    }
}
