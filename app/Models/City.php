<?php

namespace App\Models;

use App\Models\User;
use App\Models\Route;
use App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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

    public function drivers(){
        return $this->belongsToMany(Driver::class, 'driver_cities')->withTrashed();
    }

}
