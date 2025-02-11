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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('gender', ['male', 'female']);
            $table->string('address');
            $table->date('DOB');
            $table->unsignedBigInteger('dept_id');
            $table->foreign('dept_id')->references('id')->on('department');
            $table->timestamps();
            $table->enum('status', ['cont', 'emp', 'not_act']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
