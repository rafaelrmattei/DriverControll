<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Manager;
use App\Models\Driver;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manager_drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreignIdFor(Manager::class)->references('id')->on('drivers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreignIdFor(Driver::class)->references('id')->on('drivers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_drivers');
    }
};
