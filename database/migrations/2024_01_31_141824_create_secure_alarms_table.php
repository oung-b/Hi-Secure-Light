<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('secure_alarms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('found_started_at');
            $table->string('found_finished_at');
            $table->string('pivot')->nullable();
            $table->unsignedBigInteger('count');
            $table->string('level');
            $table->string('sip')->nullable();
            $table->string('dip')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('secure_alarms');
    }
};
