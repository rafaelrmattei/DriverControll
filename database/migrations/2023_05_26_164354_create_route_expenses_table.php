<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Route;
use App\Models\Expense;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_expenses', function (Blueprint $table) {
            $table->id();
            $table->double('value', 2)->nullable();
            $table->text('description')->nullable();
            $table->foreignIdFor(Route::class)->references('id')->on('routes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreignIdFor(Expense::class)->references('id')->on('expenses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_expenses');
    }
};
