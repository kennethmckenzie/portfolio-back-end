<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'header_text',
        'video',
        'sub_text'
    ];
}
