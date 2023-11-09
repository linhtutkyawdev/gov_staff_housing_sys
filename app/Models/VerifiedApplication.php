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
        'nric',
        'score',
    ];

    // Define the relationship with the "infos" table
    public function info()
    {
        return $this->belongsTo(Info::class, 'nric', 'nric');
    }
}
