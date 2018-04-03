<?php

namespace App\Http\Controllers;

use App\Repositories\DriverRepository;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    private $driverRepository;
    /**
     * DriverController constructor.
     */
    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashView = false;

        if(Session::has('trashview')) {
            $trashView = Session::get('trashview');
        }

        return view('drivers.index', [
            'drivers' => $this->driverRepository->getDrivers($trashView, 15)]);
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


    public function store()
    {

        $this->driverRepository->newDriver();
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
        $driver = $this->driverRepository->showDriver($id);

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

        $driver = $this->driverRepository->showDriver($id);

        if (!$driver->trashed()) {

            return view('drivers.edit',
                compact('driver'));
        }

        return redirect(route('drivers.index'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {
        $this->driverRepository->updateDriver($id);
        return redirect(route('drivers.index'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        $driver = $this->driverRepository->showDriver($id);

        if (!$driver->trashed()) {
            $driver->delete();
        }

        return redirect(route('drivers.index'));
    }

    /**
     * Restore the specified resource .
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id) {
        $this->driverRepository->restore($id);
        Session::put('trashview', false);

        return redirect(route('drivers.index'));

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setTrashon() {
        Session::put('trashview', true);

        return redirect(route('drivers.index'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setTrashoff() {
        Session::put('trashview', false);

        return redirect(route('drivers.index'));
    }

}

