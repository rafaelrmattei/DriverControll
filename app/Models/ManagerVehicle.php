<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagerVehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'manager_id',
        'vehicle_id',
    ];

    protected $hidden = [
        'user_id',
        'manager_id',
        'vehicle_id',
    ];

    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

}
