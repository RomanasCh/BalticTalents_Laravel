<?php

namespace App\Http\Controllers;

use App\Models\Radar;
use Illuminate\Http\Request;

class RadarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radars = Radar::withTrashed()->paginate(15);

        return view('radars.index',
            compact('radars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('radars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $radar = Radar::create([
            'number'   => $request->get('number'),
            'distance' => $request->get('distance'),
            'time'     => $request->get('time')
        ]);

        return redirect(route('radars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $radar = Radar::withTrashed()->find($id);

        if (!$radar->trashed()) {
            return view('radars.show',
                compact('radar'));
        }

        return redirect(route('radars.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $radar = Radar::withTrashed()->find($id);

        if (!$radar->trashed()) {

            return view('radars.edit',
                compact('radar'));
        }

        return redirect(route('radars.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $radar = Radar::find($id);
        $radar->number = $request->get('number');
        $radar->distance = $request->get('distance');
        $radar->time = $request->get('time');
        $radar->save();

        return redirect(route('radars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $radar = Radar::withTrashed()->find($id);

        if (!$radar->trashed()) {
            $radar->delete();
        }


        return redirect(route('radars.index'));
    }

    public function restore($id) {
        $radar = Radar::withTrashed()->find($id);
        $radar->restore();

        return redirect(route('radars.index'));

    }

}
