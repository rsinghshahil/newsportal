<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\News;
use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use File;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Image;


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
                ->paginate(50);
                // DD($news);
        return view('backend.news.index',compact('news','categories'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subcategories')->where('parent_id','=',0)->get();
        return view('backend.news.create')->with(compact('categories'));
        // return view('backend.news.add-news');
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
            'category' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,jfif,gif,svg|max:2048',
            // 'url' => SlugService::createSlug(News::class, 'url', $request->headline),
        ]);
        if($request->has('image')){
        $imageUpload = $request->file('image');
        $imageName = time() .'.'.$imageUpload->getClientOriginalExtension();
        $imagepath = public_path('/backend/media/featured_images/');
        $imageUpload->move($imagepath,$imageName);

        News::create([
            'headline' => $request['headline'],
            'content' => $request['content'],
            'category' => $request['category'],
            // 'url' => SlugService::createSlug(News::class, 'url', $request->headline),
            'image' => '/backend/media/featured_images/'.$imageName,
            ]);
        // $img = News::make($imagepath)->resize(760, 500)->save($imagepath);
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
    public function show($url)

    {
        // $post = News::find($url);
        $post = News::where('url', $url)->first();

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

        $categories = Category::with('subcategories')->where('parent_id','=',0)->get();

        return view('backend.news.edit',compact('post','categories'));
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
            'category' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,jfif,gif,svg|max:2048',
        ]);

        $update = News::find($request->news_id);
        $update->headline = $request->headline;
        $update->content = $request->content;
        $update->category = $request->category;
        $update->url = SlugService::createSlug(News::class, 'url', $request->headline);

        //getting the old image/imagepath of the old post
        $orginalImage = $update->image;

        //generating the full path of the post's original image
        // $imagepath = public_path($orginalImage);

        if ($request->has('image')) {
            $imageUpload = $request->file('image');

            //if the request has a new file, deleting the previous image for the new image.
            if (File::exists(public_path($orginalImage))) {
                File::delete(public_path($orginalImage));
            }

            $imageName = time() .'.'.$imageUpload->getClientOriginalExtension();
            $imagepath = public_path('/backend/media/featured_images/');
            $imageUpload->move($imagepath,$imageName);
            $update->image = '/backend/media/featured_images/'.$imageName;
            $update->save();
        }
        else{

        $update->save();
        }

        Alert::success('Success', 'News updated successfully.');
        return redirect()->route('admin.news.index')
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

        //getting the old image/imagepath of the old post
        $orginalImage = $delete->image;

        //generating the full path of the post's original image
        // $imagepath = public_path($orginalImage);

        if (File::exists(public_path($orginalImage))) {
            File::delete(public_path($orginalImage));
            // $image_path = $delete->image;
        }

        $delete->delete();
        Alert::success('Success', 'News Deleted successfully.');
        return redirect()->back();

    }
}
