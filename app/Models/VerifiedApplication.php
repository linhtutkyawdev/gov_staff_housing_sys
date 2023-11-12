<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiedApplication extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'nrc',
        'full_name',
        'age_score',
        'experience_score',
        'rank_score',
        'family_count_score',
        'elders_and_kids_count_score',
        'accomodation_situation_score',
        'physically_form_submitted_date_score',
        'moved_to_state_date_score',
        'both_couple_are_staffs_in_same_city_score',
        'special_situation_score',
        'total_score'
    ];

    // Define the relationship with the "infos" table
    public function info()
    {
        return $this->belongsTo(Info::class, 'nrc', 'nrc');
    }
}
