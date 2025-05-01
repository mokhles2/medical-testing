<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hospital extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $guarded = [];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function medicalHistories(){
        return $this->hasMany(MedicalHistory::class);
    }
}
