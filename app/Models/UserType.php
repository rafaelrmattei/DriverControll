<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{    
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->hasMany(User::class)->withTrashed();
    }

}
