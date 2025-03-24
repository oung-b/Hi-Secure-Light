<?php

use App\Models\Hardware;
use App\Models\Software;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('identify_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Hardware::class)->nullable();
            $table->foreignIdFor(Software::class)->nullable();
            $table->string('created_by');
            $table->string('type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('identify_logs');
    }
};
