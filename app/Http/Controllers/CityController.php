<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cities = City::paginate(5);

        return view('cities.index', compact('cities'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * @param \App\Http\Requests\CityRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request)
    {
        City::create($request->validated());

        return redirect()->route('cities.index');
    }

    public function show(City $city)
    {

    }

    /**
     * @param \App\City $city
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * @param \App\Http\Requests\CityRequest $request
     * @param \App\City                      $city
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validated());

        flash()->success('City was updated');

        return redirect()->route('cities.index');
    }

    /**
     * @param \App\City $city
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();

        flash()->warning('City was deleted');

        return redirect()->route('cities.index');
    }
}
