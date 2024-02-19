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
        Schema::create('phone', function (Blueprint $table) {
            //primary key
            $table->id();
            $table->string('phone_name');
        
            //foreign key dari author
            $table->foreignId('pemilik_id')->constrained();
            $table->string('phone_image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
