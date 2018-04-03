<?php

namespace App\Repositories;

use App\Models\Driver;
use App\Models\Radar;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RadarRepository.
 */
class DriverRepository
{
    /**
     * @param bool $trashView
     * @param int  $pageSize
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getDrivers(bool $trashView, int $pageSize)
    {
        if ($trashView) {
            return Driver::onlyTrashed()->paginate($pageSize);
        }

        return Driver::paginate($pageSize);
    }

    /**
     * @param $id
     */
    public function updateDriver($id) {
        $request = request();
        $userid = (!Auth::guest()) ? Auth::user()->id : null;

        $driver = Driver::find($id);
        $driver->name = $request->get('name');
        $driver->city = $request->get('city');
        $driver->user_id = $userid;
        $driver->save();

    }

    /**
     *  Store a newly created resource in storage.
     */
    public function newDriver() {

        $userid = (!Auth::guest()) ? Auth::user()->id : null;
        $request = request();

        $driver = Driver::create([
            'name'   => $request->get('name'),
            'city' => $request->get('city'),
            'user_id'  => $userid
        ]);

    }

    /**
     * @param $id
     */
    public function restore($id) {
        $driver = Driver::withTrashed()->find($id);
        $driver->restore();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function showDriver($id) {
        return Driver::all()->find($id);
    }
}
