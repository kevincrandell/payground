<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SimplifyPracticeRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('practice_records', function (Blueprint $table) {
            $table->integer('score', $autoIncrement = false, $unsigned = true);
            $table->dropColumn('qty_available_notes');
            $table->dropColumn('qty_correctly_played_notes');
            $table->dropColumn('qty_incorrectly_played_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('practice_records', function (Blueprint $table) {
            $table->integer('qty_available_notes');
            $table->integer('qty_correctly_played_notes');
            $table->integer('qty_incorrectly_played_notes');
            $table->dropColumn('score');
        });
    }
}
