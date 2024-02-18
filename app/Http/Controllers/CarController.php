<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\Common;


class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('admin.cars.list', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::get();
        return view('admin.cars.addCar', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required|string|unique:cars|max:50',
            'luggage'=> 'required|integer',
            'doors'=> 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'content' => 'required|string|max:100',
            'passengers' => 'required|integer',
            'price' => 'required',
            'cat_id' => 'required',
            ]);
            $fileName = $this->uploadFile($request->image, "uploads");    
            $data['image'] = $fileName;        
           $data['active']= isset($request->active);
           Car::create($data);
           return redirect('admin/car')->with('success', 'Insert Data Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        $category=Category::get();
        return view('single', compact('car', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::get();
        $cars=Car::findOrFail($id);
        return view('admin.cars.editCar', compact('category','cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'title'=>'required|string|max:50',
            'luggage'=> 'required|integer',
            'doors'=> 'required|integer',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'content' => 'required|string|max:100',
            'passengers' => 'required|integer',
            'price' => 'required',
            'cat_id' => 'required',
            ]);
            if ($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, "uploads");    
            $data['image'] = $fileName; 
            }       
           $data['active']= isset($request->active);
           Car::where('id', $id)->update($data);
           return redirect('admin/car')->with('success', 'Insert Data Success');
           unlink("asset('uploads/' . $request->oldImage)");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();
        return redirect('admin/car')->with('danger', 'Delete Data Success');
    }
}
