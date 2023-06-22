<?php

namespace App\Models;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\City;
use App\Models\RouteExpense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'date',
        'km_initial',
        'km_final',
        'driver_id',
        'vehicle_id',
        'city_id',
    ];

    protected $hidden = [
        'driver_id',
        'vehicle_id',
        'city_id',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class)->withTrashed();
    }

    public function driver(){
        return $this->belongsTo(Driver::class)->withTrashed();
    }

    public function city(){
        return $this->belongsTo(City::class)->withTrashed();
    }

    public function expenses(){
        return $this->hasMany(RouteExpense::class)->withTrashed();
    }

}
