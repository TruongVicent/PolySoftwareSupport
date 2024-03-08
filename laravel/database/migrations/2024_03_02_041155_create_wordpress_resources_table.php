<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wordpress_resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->string('thumbnail');
            $table->string('version', 10);
            $table->string('type');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wordpress_resources');
    }
};
