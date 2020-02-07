<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('sdfg');
        //return view('backend.category.add-category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('subcategories')->where('parent_id','=',0)->get();
        return view('backend.category.add-category')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pcategory_id' => 'required|sometimes',
            'sub_category' => 'required|max:200',
            'description' => 'required',
        ]);

        Category::create([
            'name' => $request->sub_category,
            // 'slug' => null,
            'parent_id' => isset($request->pcategory_id) == true ? $request->pcategory_id : 0 ,
            'description' => $request->description,
        ]);
        if(isset($request->pcategory_id) == true){
            Alert::success('Success', 'Subcategory Saved!');
        }else{
            Alert::success('Success', 'Category Saved!');
        }
        return redirect()->back()->with('success','Category Saved!');

        // $validatedData = $request->validate([
        //     'name' => 'required|max:200',
        //     'description' => 'required',
        // ]);

        // Category::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ]);
        // Alert::success('Success', 'Category Saved!');
        // return redirect()->back()->with('success','Category Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'pcategory_id' => 'required|sometimes',
            'sub_category' => 'required|max:200',
            'description' => 'required',
            ]);

            if ($request->category_id > 0 && $request->sub_category_id == 0){
                $update = Category::find($request->category_id);
                $update->name = $request->sub_category;
                $update->description = $request->description;
                if(isset($request->pcategory_id) && $request->pcategory_id != 0){
                    $update->parent_id = $request->pcategory_id;
                }else{
                    $update->parent_id = $request->pcategory_id;
                }
                $update->save();
                Alert::success('Success', 'Category Saved!');
            }

            if ($request->sub_category_id > 0 && $request->category_id == 0 ){
                $update = Category::find($request->sub_category_id);
                $update->name = $request->sub_category;
                $update->description = $request->description;
                $update->parent_id = $request->pcategory_id;
                $update->save();
                Alert::success('Success', 'Subcategory Saved!');
            }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id);
        $delete->delete();
        if($delete->parent_id == 0){
            Alert::success('Success','Category Deleted');
        }else{
            Alert::success('Success','SubCategory Deleted');
        }
        return response()->json(['success' => 'Deleted'],200);
    }
}
