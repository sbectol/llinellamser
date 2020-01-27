<?php

namespace App\Http\Controllers;

use App\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $timeline = Timeline::all()->sortBy('dyddiad');
        return view('gweinyddu.index',compact('timeline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('gweinyddu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Timeline;
        $data->title = request('title');
        $data->title_cym = request('title_cym');
        $data->asset_type = request('asset_type');
        $data->asset = request('asset');
        $data->image = request('image');
        $data->asset_cym = request('asset_cym');
        $data->dyddiad = request('dyddiad');
        // $data->show_title = isset($request['show_title']) ? 1 : 0;

        $data->save();
        return redirect('/gweinyddu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function show(Timeline $timeline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $timeline= Timeline::find($id);

        //load form view
        return view('gweinyddu.edit', ['timeline' => $timeline, 'title'=> 'Golygu Digwyddiad']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //$data = $request->all();

        $data['title'] = request('title');
        $data['title_cym'] = request('title_cym');
        $data['dyddiad'] = request('dyddiad');

       $data['asset'] = request('asset');
       $data['asset_cym'] = request('asset_cym');
       $data['asset_type'] = request('asset_type');






        //update post data
        Timeline::find($id)->update($data);

        return redirect('/gweinyddu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timeline  $timeline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $timeline = Timeline::find($id);
        $timeline->delete();
        return redirect('/gweinyddu');
    }
}
