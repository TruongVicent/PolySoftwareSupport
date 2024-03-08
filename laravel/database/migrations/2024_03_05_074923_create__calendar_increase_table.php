<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ClassSubject;
use App\Models\Room;
use App\Models\Study;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CalendarIncrease', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Study::class);
            $table->date('date');
            $table->foreignIdFor(ClassSubject::class);
            $table->foreignIdFor(Room::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CalendarIncrease');
    }
};
