<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'nric',
        'age',
        'experience',
        'rank',
        'family_count',
        'elders_and_kids_count',
        'accomodation_situation',
        'physically_form_submitted_date',
        'moved_to_state_date',
        'both_couple_are_staffs_in_same_city',
        'special_situation',
        'verified'
    ];
}
