<?php

namespace App\Models;

use App\Models\UserType;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\City;
use App\Models\DriverCity;
use App\Models\DriverVehicle;
use App\Models\Manager;
use App\Models\ManagerCity;
use App\Models\ManagerVehicle;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{    
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type_id',
        'driver_id',
        'manager_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'user_type_id',
        'driver_id',
        'manager_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(){
        if($this->user_type_id === 1){ 
            return true; 
        }
        return false; 
    }

    public function isDriver(){
        if($this->user_type_id === 2){ 
            return true; 
        }
        return false; 
    }

    public function isManager(){
        if($this->user_type_id === 3){ 
            return true; 
        }
        return false; 
    }

    public function type(){
        return $this->belongsTo(UserType::class, 'user_type_id')->withTrashed();
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class)->withTrashed();
    }

    public function drivers(){
        return $this->hasMany(Driver::class)->withTrashed();
    }

    public function cities(){
        return $this->hasMany(City::class)->withTrashed();
    }

    public function driverCities(){
        return $this->hasMany(DriverCity::class)->withTrashed();
    }

    public function driverVehicles(){
        return $this->hasMany(DriverVehicle::class)->withTrashed();
    }

    public function managers(){
        return $this->hasMany(Manager::class)->withTrashed();
    }

    public function managerCities(){
        return $this->hasMany(ManagerCity::class)->withTrashed();
    }

    public function managerVehicles(){
        return $this->hasMany(ManagerVehicle::class)->withTrashed();
    }

}
