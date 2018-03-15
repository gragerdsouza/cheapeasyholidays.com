<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ToursCreateRequest;
use App\Photo;
use App\Tour;
use App\TourImage;
use App\Destination;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $tours = Tour::all();
		$path = '../';
		
        return view('admin.tours.index', compact('tours','path'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$destinations = Destination::pluck('title','id')->all();
		$categories = Category::pluck('name','id')->all();
        return view('admin.tours.create',compact('destinations','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ToursCreateRequest $request)
    {
        //
		$input = $request->all();
		if($request->hasFile('myfile')){
			$tour = Tour::create($input);
			$files = $request->file('myfile');
			
			foreach ($files as $file) {
				$name = time() . $file->getClientOriginalName();
				$file->move('images/tours/', $name);
				TourImage::create(['file'=>$name,'tour_id'=>$tour->id]);
			}

		}
		
        /*$input = $request->all();
		print_r($input);exit;
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/medias/', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
		Destination::create($input);*/
        return redirect('/admin/tours');

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
        //
        $tour = Tour::findOrFail($id);
        $destinations = Destination::pluck('title','id')->all();
        $categories = Category::pluck('name','id')->all();
        return view('admin.tours.edit', compact('tour','destinations','categories'));
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
        //
		$tour = Tour::findOrFail($id);
        $input = $request->all();
		$tour->update($input);
        return redirect('/admin/tours');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tour = Tour::findOrFail($id);
		$tourimmages = TourImage::where('tour_id', $tour->id)->get();

        $tour->delete();
		foreach ($tourimmages as $file) {
			unlink(public_path('') . $file->file);
		}
        
        Session::flash('deleted_tour', 'The tour has been deleted');

        return redirect('/admin/tours');
    }
}
