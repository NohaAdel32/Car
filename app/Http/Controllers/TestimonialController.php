<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonials.list', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.addTestimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'position'=> 'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'content' => 'required|string',
            ]);
            $fileName = $this->uploadFile($request->image, 'assets/images');    
            $data['image'] = $fileName;
           $data['published']= isset($request->published);
           Testimonial::create($data);
           return redirect('admin/Testi')->with('success', 'Insert Data Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testi = Testimonial::findOrFail($id);
        return view ('admin.testimonials.editTestimonial', compact('testi')); 
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'name'=>'required|string|max:50',
            'position'=> 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'content' => 'required|string',
            ]);
            if ($request->hasFile('image')){
               // $oldImage=$data->image;
                $fileName = $this->uploadFile($request->image, 'assets/images');  
                if (!empty($data['image'])) {
                    Storage::delete('assets/images/' . $data['image']);
                }
                 $data['image'] = $fileName;
                
            }
            $data['published']= isset($request->published);
             Testimonial::where('id', $id)->update($data);
           return redirect('admin/Testi')->with('success', 'Update Data Success');
          
          // unlink("asset('assets/images/' . $data->oldImage)");
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect('admin/Testi')->with('danger', 'Delete Data Success');
    }
}
