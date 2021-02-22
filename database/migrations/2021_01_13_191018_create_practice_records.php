<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticeRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('segment_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->uuid('session_uuid');
            $table->float('tempo_multiplier');
            $table->integer('qty_available_notes');
            $table->integer('qty_correctly_played_notes');
            $table->integer('qty_incorrectly_played_notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practice_records');
    }
}
