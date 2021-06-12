<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentsTable extends Migration
{
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('pic')->nullable();
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->string('power');
            $table->string('notes')->nullable();
            $table->date('ownership_date');
            $table->integer('company')->index();
            $table->integer('site')->index();
            $table->bigInteger('group')->index()->unsigned();
            $table->bigInteger('ownership')->index()->unsigned();
            $table->bigInteger('status')->index()->unsigned();
            $table->integer('is_delete')->default('0');
            $table->timestamps();
        });

        Schema::table('equipments', function($table) {
           //foreign keys
           $table->foreign('company')->references('id')->on('ops_hr.companies')->onUpdate('cascade');
           $table->foreign('group')->references('id')->on('equipment_groups')->onUpdate('cascade');
           $table->foreign('status')->references('id')->on('equipment_statuses')->onUpdate('cascade');
           $table->foreign('ownership')->references('id')->on('ownerships')->onUpdate('cascade');
           $table->foreign('site')->references('id')->on('ops_hr.work_places')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
}
