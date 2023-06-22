<?php

namespace App\Models;

use App\Models\Route;
use App\Models\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteExpense extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'value',
        'quantity',
        'description',
        'route_id',
        'expense_id',
    ];

    protected $hidden = [
        'route_id',
        'expense_id',
    ];
    
    public function route(){
        return $this->belongsTo(Route::class)->withTrashed();
    }

    public function expense(){
        return $this->belongsTo(Expense::class)->withTrashed();
    }

}
