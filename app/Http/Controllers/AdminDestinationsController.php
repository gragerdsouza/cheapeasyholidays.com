<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\DestinationsCreateRequest;
use App\Photo;
use App\Destination;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminDestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $destinations = Destination::all();
		$path = '../';
		
        return view('admin.destinations.index', compact('destinations','path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationsCreateRequest $request)
    {
        //
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/medias/', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
			//$image = Photo::make(sprintf('images/medias/', $name))->resize(200, 200)->save();
        }
		Destination::create($input);
        return redirect('/admin/destinations');

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
        $destination = Destination::findOrFail($id);
		$path = '../../../';
        return view('admin.destinations.edit', compact('destination','path'));
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
		$destination = Destination::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/medias/', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
		$destination->update($input);
        return redirect('/admin/destinations');

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
        $destination = Destination::findOrFail($id);

        // Path already included in user->photo->file trough assessor (?)
        unlink(public_path('') . $destination->photo->file);

        $destination->delete();

        Session::flash('deleted_destination', 'The destination has been deleted');

        return redirect('/admin/destinations');
    }
}
