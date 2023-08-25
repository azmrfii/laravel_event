<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitySRequest;
use App\Http\Requests\CityURequest;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $countries = Country::all();
        return view('cities.index', compact('cities', 'countries'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CitySRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::all();
        return view('cities.edit', compact('countries', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityURequest $request, City $city)
    {
        $city->update($request->validated());
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
