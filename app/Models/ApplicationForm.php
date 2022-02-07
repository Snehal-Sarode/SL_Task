<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname', 'lastname','email', 'mobile','talk_title','image'
    ];
}
