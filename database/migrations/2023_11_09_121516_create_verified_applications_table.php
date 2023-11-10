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
        Schema::create('verified_applications', function (Blueprint $table) {
            $table->id();
            $table->string('nric')->unique();
            $table->foreign('nric')->references('nric')->on('infos');
            $table->string('full_name');
            $table->integer('age_score');
            $table->integer('experience_score');
            $table->integer('rank_score');
            $table->integer('family_count_score');
            $table->integer('elders_and_kids_count_score');
            $table->integer('accomodation_situation_score');
            $table->integer('physically_form_submitted_date_score');
            $table->integer('moved_to_state_date_score');
            $table->integer('both_couple_are_staffs_in_same_city_score');
            $table->integer('special_situation_score');
            $table->integer('total_score');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verified_applications');
    }
};
