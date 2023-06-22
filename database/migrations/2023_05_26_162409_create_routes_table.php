<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\City;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->bigInteger('km_initial')->nullable();
            $table->bigInteger('km_final')->nullable();
            $table->foreignIdFor(Vehicle::class)->references('id')->on('vehicles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreignIdFor(Driver::class)->references('id')->on('drivers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreignIdFor(City::class)->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
