<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games2', function (Blueprint $table) {
            $table->foreignId('level_id')->constrained('levels')->cascadeOnDelete();
            $table -> string('path');
            $table -> integer('size')->default(0);
            $table->longText('image')->nullable();
            $table->id();
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games2');
    }
};
