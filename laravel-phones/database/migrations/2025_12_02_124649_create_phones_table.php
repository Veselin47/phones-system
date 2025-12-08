<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('phones', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // маркетингово име
        $table->foreignId('phone_model_id')->constrained('phone_models')->cascadeOnDelete();
        $table->foreignId('manufacturer_id')->constrained('manufacturers')->cascadeOnDelete();
        $table->smallInteger('release_year')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
