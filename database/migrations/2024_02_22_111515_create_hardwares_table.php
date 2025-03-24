<?php

use App\Models\System;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hardwares', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(System::class);
            $table->string('name');
            $table->string('location');
            $table->string('model')->nullable();
            $table->string('q_type')->nullable();
            $table->string('version')->nullable();
            $table->string('rj45')->nullable();
            $table->string('usb')->nullable();
            $table->string('serial')->nullable();
            $table->string('ip_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hardwares');
    }
};
