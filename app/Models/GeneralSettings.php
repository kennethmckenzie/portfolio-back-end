<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email_address',
        'cv',
        'linkedin_url',
        'primary_color',
        'secondary_color',
        'third_color',
        'main-font',
        'secondary_font',
    ];
}
