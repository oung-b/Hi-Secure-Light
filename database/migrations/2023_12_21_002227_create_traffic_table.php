<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("device_id");
            $table->foreign("device_id")->references("id")->on("devices")->onDelete("cascade");
            $table->double("count")->default(0);
            $table->double("min")->default(0);
            $table->double("max")->default(0);
            $table->double("sum")->default(0);
            $table->double("pow2sum")->default(0);
            $table->double("avg")->default(0);
            $table->double("stedv")->default(0);
            $table->date("recorded_at");
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
        Schema::dropIfExists('traffic');
    }
}
