<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Drivers::withTrashed()->paginate(15);

        return view('drivers.index',
            compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = Drivers::create([
            'name'   => $request->get('name'),
            'city' => $request->get('city')
        ]);
        return redirect(route('drivers.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Drivers::withTrashed()->find($id);

        if (!$driver->trashed()) {
            return view('drivers.show',
                compact('driver'));
        }

        return redirect(route('drivers.index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $driver = Drivers::withTrashed()->find($id);

        if (!$driver->trashed()) {

            return view('drivers.edit',
                compact('driver'));
        }

        return redirect(route('drivers.index'));
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
        $driver = Drivers::find($id);
        $driver->name = $request->get('name');
        $driver->city = $request->get('city');
        $driver->save();

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Drivers::withTrashed()->find($id);

        if (!$driver->trashed()) {
            $driver->delete();
        }

        return redirect(route('drivers.index'));
    }

    public function restore($id) {
        $driver = Drivers::withTrashed()->find($id);
        $driver->restore();

        return redirect(route('drivers.index'));

    }

}

