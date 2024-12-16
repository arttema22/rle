<?php

use App\Models\Dir\DirFuelCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dir_fuel_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        DirFuelCategory::create([
            'name' => 'Не определено',
        ]);
        DirFuelCategory::create([
            'name' => 'Дизель',
        ]);
        DirFuelCategory::create([
            'name' => 'Бензин',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dir_fuel_categories');
    }
};
