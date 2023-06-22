<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    
    public function index()
    {        

        $data['cities'] = City::orderBy('name','ASC')->get();

        return view('cities.list', $data);
        
    }
    
    public function create()
    {

        return view('cities.create');

    }
    
    public function store(Request $request)
    {

        $data            = $request->only(['name']);
        $data['name']    = Str::title($data['name']);
        $data['user_id'] = auth()->user()->id;

        $city = City::create($data);

        return redirect()->route('cities');

    }
    
    public function edit(Request $request)
    {

        $data['city'] = City::findOrFail($request->id);

        return view('cities.edit', $data);
        
    }
    
    public function update(Request $request)
    {
        
        $city = City::find($request->id);

        if(!$city){
            return redirect()->route('cities');
        }

        $data         = $request->only(['name']);
        $data['name'] = Str::title($data['name']);

        $city->update($data);
        $city->save();

        return redirect()->route('cities');

    }
    
    public function destroy(Request $request)
    {
        
        $city = City::find($request->id);

        if(!$city){
            return redirect()->route('cities');
        }

        $city->delete();
        
        return redirect()->route('cities');

    }

}
