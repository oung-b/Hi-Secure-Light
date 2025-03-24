<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("device_id");
            $table->foreign("device_id")->references("id")->on("devices")->onDelete("cascade");
            $table->string("message")->nullable();
            $table->string("status")->nullable();
            $table->integer("byte")->nullable();
            $table->string("sensor")->nullable();
            $table->dateTime("logged_at")->nullable();
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
        Schema::dropIfExists('histories');
    }
}
