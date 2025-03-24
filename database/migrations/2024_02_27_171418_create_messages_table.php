<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("device_id")->nullable();
            $table->foreign("device_id")->references("id")->on("devices")->onDelete("cascade");

            $table->text("device_raw")->nullable();

            $table->text("parent")->nullable();
            $table->text("parent_raw")->nullable();

            $table->text("type")->nullable();
            $table->text("type_raw")->nullable();

            $table->text("status")->nullable();
            $table->text("status_raw")->nullable();

            $table->text("objid")->nullable();

            $table->text("name")->nullable();
            $table->text("name_raw")->nullable();

            $table->text("message")->nullable();
            $table->text("message_raw")->nullable();

            $table->dateTime("datetime")->nullable();
            $table->string("datetime_raw")->nullable();

            $table->index("datetime");
            $table->index(["device_id", "datetime"]);

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
        Schema::dropIfExists('messages');
    }
}
