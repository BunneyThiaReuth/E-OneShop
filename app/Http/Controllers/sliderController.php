<?php

namespace App\Http\Controllers;
use App\slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = slider::join('tbl_image','tble_slider.imageID','=','tbl_image.imgID')
                        ->select('tble_slider.*','tbl_image.imgname as imgname')
                        ->paginate(5);
        return view('admin.sliders',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $addslide = new slider();
        $addslide -> imageID = $data['txt_slimage'];
        $addslide -> slidename = $data['txt_slName'];
        $addslide -> text = $data['txt_text'];
        $addslide -> description = $data['txt_desc'];
        $addslide -> status = $data['txt_status'];
        $addslide -> save();
        return Redirect('/sliders')->with('success', 'This record inserted is successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slideforedit = slider::find($id);
        $slide = slider::join('tbl_image','tble_slider.imageID','=','tbl_image.imgID')
                            ->select('tble_slider.*','tbl_image.imgname as imgname')
                            ->paginate(5);
            return view('admin.Editsliders',compact('slide','slideforedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = slider::find($id);
        $data = $request->input();
        $update -> imageID = $data['txt_slimage'];
        $update -> slidename = $data['txt_slName'];
        $update -> text = $data['txt_text'];
        $update -> description = $data['txt_desc'];
        $update -> status = $data['txt_status'];
        $update -> save();
        return Redirect('/sliders')->with('success', 'This record updated is successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = slider::find($id);
        $delete->delete();
        return Redirect('/sliders')->with('success', 'This record deleted is successfully...');
    }
    public function endisable($id)
    {
        $slider = slider::find($id);
        if($slider['status'] == 1)
        {
            $slider['status'] = 0;
        }
        else{
            $slider['status'] = 1;
        }
        $slider -> save();
        return Redirect('/sliders')->with('success', 'This record updated status is successfully...');
    }
}
