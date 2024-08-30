<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{

    use HasFactory;

    protected $fillable =[
    'about_app',
    'phone',
    'email',
    'fb_link',
    'tw_link',
    'insta_link',
    'yt_link',
    'wts_link',
    'notifications_settings_text'
];

}
