<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverCity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'driver_id',
        'city_id',
    ];

    protected $hidden = [
        'user_id',
        'driver_id',
        'city_id',
    ];

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

}
