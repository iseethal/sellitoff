<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function AllSlider()
    {
        $sliders = Slider::where('is_active', '=', 1)->get();

        return view('backend.sliders.all_sliders', compact('sliders'));
    }

    public function AddSlider()
    {

        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('backend.sliders.add_slider',compact('category'));
    }

    public function StoreSlider(Request $request)
    {
        if ($request->file('image') != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/slider'), $filename);
            $path       = "public/backend/image/slider/$filename";
        } else {
            $filename = "";
        }

        Slider::insert([

            'category_id'    => $request->category_id,
            'title'          => $request->title ?? "",
            'subtitle'       => $request->subtitle ?? "",
            'description'    => $request->description ?? "",
            // 'link'        => $request->link?? "",
            'image'          => $filename,
            'is_active'      => $request->is_active,
        ]);

        return redirect()->route('slider.all')->with('success', 'Slider Added');
    }

    public function EditSlider(Request $request)
    {
        $id         = $request->id;
        $sliders    = Slider::findOrFail($id);
        $category   = Category::where('is_deleted', '<>', 1)->get();
        
        return view('backend.sliders.edit_slider', compact('sliders','category'));

    }

    public function UpdateSlider(Request $request, $id)
    {

        $id      = $request->id;
        $slider  = Slider::findOrFail($id);


        if ($request->file('image') != null) {

            $imagePath = public_path('backend/image/slider/' . $slider->image);
            if ($slider->image != null) {
                unlink($imagePath);
            }

            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $request->image->move(public_path('backend/image/slider'), $filename);
            $path       = "public/backend/image/slider/$filename";
        }

        $image  = Slider::where('id', $id)->pluck('image')->first();


        Slider::findOrFail($id)->update([

            'category_id' => $request->category_id,
            'title'       => $request->title,
            'subtitle'    => $request->subtitle,
            'description' => $request->description,
            // 'link'     => $request->link ?? "",
            'image'       => $filename ?? $image,
            'is_active'   => $request->is_active,
        ]);

        return redirect()->route('slider.all')->with('success', 'Slider Updated');
    }

    public function DeleteSlider($id)
    {
        Slider::findOrFail($id)->update([

            'is_active' => 2,
        ]);

        return redirect()->back()->with('success', 'Slider Removed');
    }
}
