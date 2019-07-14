<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('position');
            $table->bigInteger('category_id')->unsigned();
            $table->unsignedInteger('salary');
            $table->unsignedInteger('salary_max');
            $table->enum('cycle', ['monthly', 'yearly', 'weekly', 'daily', 'hourly']);
            $table->string('currency');
            $table->enum('gender', ['male', 'female', 'any']);
            $table->enum('job_type', ['full_time', 'part_time', 'contract', 'temporary', 'commission', 'internship']);
            $table->enum('experience_level', ['mid', 'entry', 'senior']);
            $table->text('description');
            $table->text('skills');
            $table->text('responsibilities');
            $table->text('educational_requirements');
            $table->text('experience_requirements');
            $table->text('additional_requirements');
            $table->text('benefits');
            $table->text('apply_instructions');
            $table->bigInteger('country_id')->unsigned();
            $table->string('country_name');
            $table->bigInteger('state_id');
            $table->string('state_name');
            $table->string('city_name');
            $table->tinyInteger('experience_required_years');
            $table->unsignedInteger('views')->default(0);
            $table->dateTime('deadline');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('jobs');
    }
}
