<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name',
        'site_logo',
        'site_url',
        'site_bio'
    ];
}
