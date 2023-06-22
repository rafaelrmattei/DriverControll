<?php

namespace App\Models;

use App\Models\User;
use App\Models\Route;
use App\Models\Vehicle;
use App\Models\City;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function routes(){
        return $this->hasMany(Route::class)->withTrashed();
    }

    public function vehicles(){
        return $this->belongsToMany(Vehicle::class, 'driver_vehicles')->withTimestamps()->withTrashed();
    }

    public function cities(){
        return $this->belongsToMany(City::class, 'driver_cities')->withTimestamps()->withTrashed();
    }

}
