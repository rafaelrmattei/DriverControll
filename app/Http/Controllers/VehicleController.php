<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    
    public function index()
    {

        $data['vehicles'] = Vehicle::orderBy('plate','ASC')->get();

        return view('vehicles.list', $data);

    }
    
    public function create()
    {

        return view('vehicles.create');

    }
    
    public function store(Request $request)
    {

        $data            = $request->only(['plate']);
        $data['plate']   = Str::upper($data['plate']);
        $data['user_id'] = auth()->user()->id;

        $vehicle = Vehicle::create($data);

        return redirect()->route('vehicles');

    }
    
    public function edit(Request $request)
    {

        $data['vehicle'] = Vehicle::findOrFail($request->id);

        return view('vehicles.edit', $data);
        
    }
    
    public function update(Request $request)
    {
        
        $vehicle = Vehicle::find($request->id);

        if(!$vehicle){
            return redirect()->route('vehicles');
        }

        $data          = $request->only(['plate']);
        $data['plate'] = Str::upper($data['plate']);

        $vehicle->update($data);
        $vehicle->save();

        return redirect()->route('vehicles');

    }
    
    public function destroy(Request $request)
    {
        
        $vehicle = Vehicle::find($request->id);

        if(!$vehicle){
            return redirect()->route('vehicles');
        }

        $vehicle->delete();
        
        return redirect()->route('vehicles');

    }
    
}
