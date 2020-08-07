<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectables', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->string('projectable_type');
            $table->bigInteger('projectable_id')->unsigned();
        });

        Schema::table('projectables', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectables');
    }
}
