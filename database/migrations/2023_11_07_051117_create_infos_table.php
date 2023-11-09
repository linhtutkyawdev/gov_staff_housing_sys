<?php

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
        Schema::create('infos', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nric')->unique();
            $table->string('full_name');
            $table->integer('age');
            $table->integer('experience');
            $table->string('rank');
            $table->integer('family_count');
            $table->integer('elders_and_kids_count');
            $table->string('accomodation_situation');
            $table->date('physically_form_submitted_date');
            $table->date('moved_to_state_date');
            $table->string('both_couple_are_staffs_in_same_city');
            $table->string('special_situation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
