<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_code');
            $table->foreignId('projects_id');
            $table->foreignId('customers_id');
            $table->foreignId('programmers_id');
            $table->date('report_period');
            $table->integer('report_to');
            $table->date('report_date');
            $table->string('item_name');
            $table->integer('item_progress');
            $table->string('finishing_timeline');
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
        Schema::dropIfExists('progress_reports');
    }
}
