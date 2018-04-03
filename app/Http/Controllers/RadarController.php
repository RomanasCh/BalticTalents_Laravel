<?php

namespace App\Http\Controllers;

use App\Repositories\RadarRepository;
use Illuminate\Support\Facades\Session;

class RadarController extends Controller
{

    private $radarRepository;

    /**
     * RadarController constructor.
     *
     * @param RadarRepository $radarRepository
     */
    public function __construct(RadarRepository $radarRepository)
    {
        $this->radarRepository = $radarRepository;
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $trashView = false;

        if(Session::has('trashview')) {
            $trashView = Session::get('trashview');
        }

        return view('radars.index', [
            'radars' => $this->radarRepository->getRadars($trashView, 15)]);
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {

        $this->radarRepository->newRadar();
        return redirect(route('radars.index'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show($id)
    {

        $radar = $this->radarRepository->showRadar($id);

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
        $radar = $this->radarRepository->showRadar($id);

        if (!$radar->trashed()) {

            return view('radars.edit',
                compact('radar'));
        }

        return redirect(route('radars.index'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id)
    {

        $this->radarRepository->updateRadar($id);
        return redirect(route('radars.index'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        $radar = $this->radarRepository->showRadar($id);

        if (!$radar->trashed()) {
            $radar->delete();
        }

        return redirect(route('radars.index'));
    }

    /**
     * Restore the specified resource .
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore($id) {

        $this->radarRepository->restore($id);
        Session::put('trashview', false);

        return redirect(route('radars.index'));

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function locale() {

        $lang ='lt';

        if(Session::has('language')) {
            strcmp(Session::get('language'), 'lt') === 0 ? $lang ='en' : $lang ='lt';
        }

        Session::put('language', $lang);

        return redirect(route('radars.index'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setTrashon() {
        Session::put('trashview', true);

        return redirect(route('radars.index'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function setTrashoff() {
        Session::put('trashview', false);

        return redirect(route('radars.index'));
    }
}
