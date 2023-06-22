<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class DriverController extends Controller
{
    
    public function index()
    {

        $data['drivers']  = Driver::orderBy('name','ASC')->get();

        return view('drivers.list', $data);

    }
    
    public function create()
    {
        
        $data['cities']   = City::orderBy('name','ASC')->get();
        $data['vehicles'] = Vehicle::orderBy('plate','ASC')->get();

        return view('drivers.create', $data);

    }
    
    public function store(Request $request)
    {

        //CHECK IF THE EMAIL WASN`T ALREADY USED
        $validator = Validator::make($request->only(['email']), [
            'email'    => 'unique:users',
        ], 
        [
            'email.unique' => 'O login já está em uso',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id         = auth()->user()->id;

        $data            = $request->only(['name','cities','vehicles']);
        $data['name']    = Str::title($data['name']);
        $data['user_id'] = $user_id;

        $driver = Driver::create($data);
        $driver->cities()->attach($data['cities'], ['user_id' => $user_id ]);
        $driver->vehicles()->attach($data['vehicles'], ['user_id' => $user_id ]);

        $data_user                 = $request->only(['email','password']);
        $data_user['name']         = $data['name'];
        $data_user['email']        = Str::lower($data_user['email']);
        $data_user['password']     = bcrypt(Str::lower($data_user['password']));
        $data_user['user_type_id'] = 2;
        $data_user['driver_id']    = $driver->id;

        $user = User::create($data_user);

        return redirect()->route('drivers');

    }
    
    public function edit(Request $request)
    {

        $driver          = Driver::with('vehicles:id')->with('cities:id')->findOrFail($request->id);
        $driverVehicles  = $driver->vehicles->pluck('id')->toArray();
        $driverCities    = $driver->cities->pluck('id')->toArray();
        $cities          = City::orderBy('name','ASC')->get();
        $vehicles        = Vehicle::orderBy('plate','ASC')->get();

        $user            = User::where('driver_id', '=', $request->id)->get();

        $driver['login'] = $user[0]['email'];

        return view('drivers.edit', compact('driver','driverVehicles','driverCities','cities','vehicles'));

    }
    
    public function update(Request $request)
    {
        
        $user_id = auth()->user()->id;

        $driver = Driver::find($request->id);

        if(!$driver){
            return redirect()->route('drivers');
        }

        $user = User::where('driver_id','=',$driver->id)->get();
        $user = User::find($user[0]->id);
        
        //CHECK IF THE EMAIL WASN`T ALREADY USED
        $validator = Validator::make($request->only(['email']), [
            'email' => [Rule::unique('users','email')->ignore($user->id)]
        ], 
        [
            'email.unique' => 'O login já está em uso',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data         = $request->only(['name','vehicles','cities']);
        $data['name'] = Str::title($data['name']);

        $cities = [];
        foreach ($data['cities'] as $city) {
            $cities[$city] = ['user_id' => $user_id];
        }

        $vehicles = [];
        foreach ($data['vehicles'] as $vehicle) {
            $vehicles[$vehicle] = ['user_id' => $user_id];
        }

        $driver->cities()->sync($cities);
        $driver->vehicles()->sync($vehicles);

        $driver->update($data);
        $driver->save();
       
        $data_user                 = $request->only(['email','password']);
        $data_user_update['name']  = $data['name'];
        $data_user_update['email'] = Str::lower($data_user['email']);

        if(!empty($data_user['password'])){
            $data_user_update['password'] = bcrypt(Str::lower($data_user['password']));
        }

        $user->update($data_user_update);
        $user->save();
        
        return redirect()->route('drivers');

    }
    
    public function destroy(Request $request)
    {

        $driver = Driver::find($request->id);

        if(!$driver){
            return redirect()->route('drivers');
        }

        $driver->delete();

        $user = User::where('driver_id', '=', $request->id)->update(['deleted_at' => Carbon::now()]);
        
        return redirect()->route('drivers');

    }
    
}
