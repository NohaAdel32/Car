<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::get();
        return view('admin.categories.list', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'category'=>'required|string|unique:categories|max:50',
            ]);
           
           Category::create($data);
           return redirect('admin/category')->with('success', 'Insert Data Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::findOrFail($id);
        return view ('admin.categories.editCategory', compact('cat')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'category'=>'required|string|unique:categories|max:50',
            ]);
            Category::where('id', $id)->update($data);
            return redirect('admin/category')->with('success', 'Update Data Success');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::with('cars')->findOrFail($id);
 
        if($category->cars->count()>0){
            return redirect('admin/category')->with('danger', 'Cannot delete this category because it is associated with cars.');
        }
       $category->delete();
        return redirect('admin/category')->with('danger', 'Delete Data Success');
    }
}
