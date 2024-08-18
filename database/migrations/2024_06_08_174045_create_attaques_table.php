<?php
/*create_attaques_table*/

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attaques', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('img_path')->nullable();
            $table->integer('dégâts');
            $table->text('description');
            $table->foreignId('type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaques');
    }
};
