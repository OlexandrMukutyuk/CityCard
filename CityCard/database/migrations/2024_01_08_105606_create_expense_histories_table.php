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
        Schema::create('expense_histories', function (Blueprint $table) {
            $table->id();
            //Дата створення
            $table->timestamps();

            //Зовнішні ключі
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ticket_type_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_histories');
    }
};
