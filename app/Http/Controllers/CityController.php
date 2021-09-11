<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::get();
        return view('admin.city.index', compact('cities'));
    }

    
    public function create()
    {
        return view('admin.city.create');
    }

    
    public function store(StoreRequest $request)
    {
        City::create($request->all());
        return redirect()->route('cities.index');
    }

   
    public function show(City $city)
    {
        return view('admin.city.show', compact('city'));
    }

    
    public function edit(City $city)
    {
        return view('admin.city.edit', compact('city'));
    }

    public function update(UpdateRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('cities.index');
    }

   
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }
}
