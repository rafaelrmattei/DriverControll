<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Manager;
use App\Models\City;
use App\Models\Expense;
use App\Models\RouteExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use NumberFormatter;

class RouteController extends Controller
{
    
    public function index()
    {        

        if(auth()->user()->user_type_id == 1){
            $data['routes'] = Route::with('expenses')->orderBy('date','DESC')->orderBy('created_at', 'desc')->get();
        } else if(auth()->user()->user_type_id == 2){
            $data['routes'] = Route::with('expenses')->where('driver_id',auth()->user()->driver_id)->orderBy('date','DESC')->orderBy('created_at', 'desc')->latest()->take(7)->get();
        } else if(auth()->user()->user_type_id == 3){
            $data['routes'] = Route::with('expenses')->where('user_id',auth()->user()->id)->orderBy('date','DESC')->orderBy('created_at', 'desc')->latest()->take(7)->get();
        }

        return view('routes.list', $data);
        
    }
    
    public function create()
    {

        if(auth()->user()->user_type_id == 1){

            $data['drivers']  = Driver::orderBy('name','ASC')->get();
            $data['vehicles'] = Vehicle::orderBy('plate','ASC')->get();
            $data['cities']   = City::orderBy('name','ASC')->get();

        } else if(auth()->user()->user_type_id == 2){

            $driver           = Driver::find(auth()->user()->driver_id);
            $data['drivers']  = new Collection([$driver]);
            $data['vehicles'] = $driver->vehicles;
            $data['cities']   = $driver->cities;

        } else if(auth()->user()->user_type_id == 3){

            $manager          = Manager::find(auth()->user()->manager_id);
            $data['drivers']  = $manager->drivers;
            $data['vehicles'] = $manager->vehicles;
            $data['cities']   = $manager->cities;

        }

        $data['expenseTypes'] = Expense::where('id','>',1)->orderBy('id','ASC')->get();

        return view('routes.create', $data);

    }
    
    public function store(Request $request)
    {

        $route            = $request->only(['date','driver_id','vehicle_id','city_id','km_initial','km_final','supply','expense']);  
        $route['user_id'] = auth()->user()->id;
        $route            = Route::create($route);

        if($request->filled('supply')){
            $keys = array_keys($request['supply']);
            foreach($keys as $key){
                $supply['quantity']    = $request['supply'][$key];
                $supply['value']       = $this->formatDouble($request['price'][$key]);
                $supply['description'] = 'Abastecimento';
                $supply['route_id']    = $route->id;
                $supply['expense_id']  = 1;
                RouteExpense::create($supply);
            }
        }

        if($request->filled('expense_id')){
            $keys = array_keys($request['expense_id']);
            foreach($keys as $key){
                $expense['value']       = $this->formatDouble($request['value'][$key]);
                $expense['description'] = $request['description'][$key];
                $expense['route_id']    = $route->id;
                $expense['expense_id']  = $request['expense_id'][$key];
                RouteExpense::create($expense);
            }
        }

        return redirect()->route('routes');

    }

    public function destroy(Request $request)
    {

        $route = Route::find($request->id);

        if(!$route){
            return redirect()->route('routes');
        }
        
        $route->delete();

        return redirect()->route('routes');

    }

    // PRIVATE FUNCIONS
    private function formatDouble($number){     
        if($number != ''){
            $formatter = new NumberFormatter(config('app.locale'), NumberFormatter::DECIMAL);
            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
            $number = preg_replace('/[^0-9,]/', '', $number);
            $number = $formatter->parse($number);
        }
        return $number;
    }
    
}
