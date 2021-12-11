<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_list', function (Blueprint $table) {
            $table->id();
            $table->foreignId('board_id');
            $table->string('title');
            $table->boolean('is_done_column')->default(false);
            $table->integer('index');
            $table->timestamps();

            $table->foreign('board_id')->references('id')->on('boards');
            $table->unique(['board_id', 'index'], 'task_list_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_list');
    }
}
