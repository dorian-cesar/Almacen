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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->unsignedBigInteger('categorias_id');
            $table->integer('cantidad');
            $table->integer('precio');


            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');

            //$table->foreign('categoria_id')->references('id')->on('categorias');

            //$table->unsignedBigInteger('user_id')->unique();

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
