<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    // protected $fillable  = ['age' , 'blood_type'];
    protected $guarded = [];
    
    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
