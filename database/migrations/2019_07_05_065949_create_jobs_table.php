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
            $table->string('slug')->nullable();
            $table->string('position');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->unsignedInteger('salary')->nullable()->nullable();
            $table->unsignedInteger('salary_max')->nullable();
            $table->enum('cycle', ['monthly', 'yearly', 'weekly', 'daily', 'hourly'])->nullable();
            $table->string('currency')->nullable();
            $table->enum('gender', ['male', 'female', 'any'])->nullable();
            $table->enum('job_type', ['full_time', 'part_time', 'contract', 'temporary', 'commission', 'internship'])->nullable();
            $table->enum('experience_level', ['mid', 'entry', 'senior'])->nullable();
            $table->text('description');
            $table->text('skills')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('educational_requirements')->nullable();
            $table->text('experience_requirements')->nullable();
            $table->text('additional_requirements')->nullable();
            $table->text('benefits')->nullable();
            $table->text('apply_instructions')->nullable();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->string('country_name')->nullable();
            $table->bigInteger('state_id')->nullable();
            $table->string('state_name')->nullable();
            $table->string('city_name')->nullable();
            $table->tinyInteger('experience_required_years')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->dateTime('deadline');
            $table->tinyInteger('status')->nullable()->comment('pending:0,approved:1,blocked:2');

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
