<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


//use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$news = News::latest()->paginate(5);
        $news = DB::table('news')
        ->orderBy('id', 'desc')
        ->paginate(5);
        // ->take(5)
        // ->with([
        //     'content' => function($query) {
        //         $query->select(DB::raw('LEFT (text, 50)'));
        //     }, 
        //      ])
        // ->get();
        return view('backend.news.index',compact('news'))
        // ->with('i','0');
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.add-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        if($request->has('image')){
        $imageUpload = $request->file('image');
        $imageName = time() .'.'.$imageUpload->getClientOriginalExtension();
        $imagepath = public_path('/backend/media/featured_images/');
        $imageUpload->move($imagepath,$imageName);
        // $request->file('image')->storeAs('/backend/media/featured_images/'.$imageName);
        News::create([
            'headline' => $request['headline'],
            'content' => $request['content'],
            'image' => '/backend/media/featured_images/'.$imageName,
            ]);
        
    }
     else{
        News::create($request->all());
     }
        Alert::success('Success', 'News Published successfully.');
        return redirect()->back()
                        ->with('success','News Published successfully.');
    }

    /**
     * Display the specified resource.
     *

     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $post)
    
    {
        // $news = DB::table('news')
        // ->where('id'.'='.$news)
        // ->get();
        return view('backend.news.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('backend.news.edit',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'headline' => 'required',
            'content' => 'required',
            
        ]);
        $news->update($request->all());
        Alert::success('Success', 'News Deleted successfully.');
        return redirect()->back();
                        // ->with('success','Product updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($news)
    {
         $delete = News::find($news);
         $delete->delete();
        // $news->delete();
           Alert::success('Success', 'News Deleted successfully.');
            return redirect()->back();
        
    }

    public function what(Request $request){
        dd($request->all());
    }
}
