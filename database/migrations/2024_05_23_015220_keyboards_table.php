<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keyboards', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('brand');
            $table->string('model');
            $table->string('type');
            $table->string('color');
            $table->float('price');
            $table->boolean('is_seeded')->default(false);
            $table->timestamps();
        });

        // Schema::table('keyboards', function (Blueprint $table) {
        //     $table->boolean('is_seeded')->default(false);
        // });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('keyboards');
    //     Schema::table('keyboards', function (Blueprint $table) {
    //     $table->dropColumn('is_seeded');
    // });
    }
};
