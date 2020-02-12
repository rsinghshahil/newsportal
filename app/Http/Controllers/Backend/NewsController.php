<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
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
                ->select('*',DB::raw('date(created_at) as created_at'))
                ->orderBy('id', 'desc')
                ->paginate(5);
                // DD($news);
        return view('backend.news.index',compact('news'))
            ->with('i', 0);
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
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->has('image')){
        $imageUpload = $request->file('image');
        $imageName = time() .'.'.$imageUpload->getClientOriginalExtension();
        $imagepath = public_path('/backend/media/featured_images/');
        $imageUpload->move($imagepath,$imageName);
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
    public function show($news)
    
    {
        $post = News::find($news);
         
        return view('backend.news.show',compact('post'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($news)
    {
        $post = News::find($news);
         
         return view('backend.news.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $request->validate([
            'headline' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $update = News::find($request->news_id);
        $update->headline = $request->headline;
        $update->content = $request->content;
        
        if($request->has('image')){
            $imageUpload = $request->file('image');
            $imageName = time() .'.'.$imageUpload->getClientOriginalExtension();
            $imagepath = public_path('/backend/media/featured_images/');
            $imageUpload->move($imagepath,$imageName);
            // dd($imageUpload,$imageName);
            $update->image = '/backend/media/featured_images/'.$imageName;
            $update->save();
        }else{

        $update->save();
     }
        Alert::success('Success', 'News updated successfully.');
        return redirect()->route('admin.add-news.index')
                        ->with('success','News Published successfully.');
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
        $image_path = $delete->image;
        // dd($image_path);
        if(File::exists($image_path)) {
            Storage::delete($image_path);
        }
        $delete->delete();
        Alert::success('Success', 'News Deleted successfully.');
        return redirect()->back();
    
    }

    public function what(Request $request){
        dd($request->all());
    }
}
