<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Manager;
use App\Models\Vehicle;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class ManagerController extends Controller
{
    
    public function index()
    {

        $data['managers']  = Manager::orderBy('name','ASC')->get();

        return view('managers.list', $data);

    }
    
    public function create()
    {
        
        $data['drivers']  = Driver::orderBy('name','ASC')->get();
        $data['cities']   = City::orderBy('name','ASC')->get();
        $data['vehicles'] = Vehicle::orderBy('plate','ASC')->get();

        return view('managers.create', $data);

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

        $data            = $request->only(['name','drivers','cities','vehicles']);
        $data['name']    = Str::title($data['name']);
        $data['user_id'] = $user_id;

        $manager = Manager::create($data);
        $manager->cities()->attach($data['cities'], ['user_id' => $user_id ]);
        $manager->vehicles()->attach($data['vehicles'], ['user_id' => $user_id ]);
        $manager->drivers()->attach($data['drivers'], ['user_id' => $user_id ]);

        $data_user                 = $request->only(['email','password']);
        $data_user['name']         = $data['name'];
        $data_user['email']        = Str::lower($data_user['email']);
        $data_user['password']     = bcrypt(Str::lower($data_user['password']));
        $data_user['user_type_id'] = 3;
        $data_user['manager_id']   = $manager->id;

        $user = User::create($data_user);

        return redirect()->route('managers');

    }
    
    public function edit(Request $request)
    {

        $manager         = Manager::with('drivers:id')->with('vehicles:id')->with('cities:id')->findOrFail($request->id);
        $managerDrivers  = $manager->drivers->pluck('id')->toArray();
        $managerVehicles = $manager->vehicles->pluck('id')->toArray();
        $managerCities   = $manager->cities->pluck('id')->toArray();
        $drivers         = Driver::orderBy('name','ASC')->get();
        $cities          = City::orderBy('name','ASC')->get();
        $vehicles        = Vehicle::orderBy('plate','ASC')->get();

        $user            = User::where('manager_id', '=', $request->id)->get();

        $manager['login'] = $user[0]['email'];

        return view('managers.edit', compact('manager','managerDrivers','managerVehicles','managerCities','drivers','cities','vehicles'));

    }
    
    public function update(Request $request)
    {
        
        $user_id = auth()->user()->id;

        $manager = Manager::find($request->id);

        if(!$manager){
            return redirect()->route('managers');
        }

        $user = User::where('manager_id','=',$manager->id)->get();
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

        $data         = $request->only(['name','drivers','vehicles','cities']);
        $data['name'] = Str::title($data['name']);

        $drivers = [];
        foreach ($data['drivers'] as $driver) {
            $drivers[$driver] = ['user_id' => $user_id];
        }

        $cities = [];
        foreach ($data['cities'] as $city) {
            $cities[$city] = ['user_id' => $user_id];
        }

        $vehicles = [];
        foreach ($data['vehicles'] as $vehicle) {
            $vehicles[$vehicle] = ['user_id' => $user_id];
        }

        $manager->drivers()->sync($drivers);
        $manager->cities()->sync($cities);
        $manager->vehicles()->sync($vehicles);

        $manager->update($data);
        $manager->save();
       
        $data_user                 = $request->only(['email','password']);
        $data_user_update['name']  = $data['name'];
        $data_user_update['email'] = Str::lower($data_user['email']);

        if(!empty($data_user['password'])){
            $data_user_update['password'] = bcrypt(Str::lower($data_user['password']));
        }

        $user->update($data_user_update);
        $user->save();
        
        return redirect()->route('managers');

    }
    
    public function destroy(Request $request)
    {

        $manager = Manager::find($request->id);

        if(!$manager){
            return redirect()->route('managers');
        }

        $manager->delete();

        $user = User::where('manager_id', '=', $request->id)->update(['deleted_at' => Carbon::now()]);
        
        return redirect()->route('managers');

    }
    
}
