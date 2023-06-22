<?php

namespace App\Models;

use App\Models\RouteExpense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'type',
    ];

    public function routes(){
        return $this->hasMany(RouteExpense::class)->withTrashed();
    }

}
