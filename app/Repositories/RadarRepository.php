<?php

namespace App\Repositories;

use App\Models\Radar;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\NumberLt;

/**
 * Class RadarRepository.
 */
class RadarRepository
{
    /**
     * @param $request
     */
    private function validator($request) {
        $request->validate([
            'number' => [new NumberLt()],
            'distance' => 'numeric',
            'time' => 'numeric'
        ]);
    }
    /**
     * @param bool $trashView
     * @param int  $pageSize
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getRadars(bool $trashView, int $pageSize)
    {
        if ($trashView) {
            return Radar::with('driver')->onlyTrashed()->paginate($pageSize);
        }

        return Radar::with('driver')->paginate($pageSize);
    }

    /**
     * @param $id
     */
    public function updateRadar($id) {
        $request = request();
        $this->validator($request);
        $userid = (!Auth::guest()) ? Auth::user()->id : null;

        $radar = Radar::find($id);
        $radar->number = $request->get('number');
        $radar->distance = $request->get('distance');
        $radar->time = $request->get('time');
        $radar->user_id = $userid;
        $radar->save();

    }

    /**
     *  Store a newly created resource in storage.
     */
    public function newRadar() {

        $userid = (!Auth::guest()) ? Auth::user()->id : null;
        $request = request();

        $this->validator($request);
        $radar = Radar::create([
            'number'   => $request->get('number'),
            'distance' => $request->get('distance'),
            'time'     => $request->get('time'),
            'user_id'  => $userid
        ]);

    }

    /**
     * @param $id
     */
    public function restore($id) {
        $radar = Radar::withTrashed()->find($id);
        $radar->restore();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function showRadar($id) {
        return Radar::all()->find($id);
    }
}
