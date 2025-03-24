<?php

use App\Models\System;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(System::class);
            $table->string('name');
            $table->string('firmware')->nullable();
            $table->string('application')->nullable();
            $table->string('patch_level')->nullable();
            $table->string('purpose')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('softwares');
    }
};
