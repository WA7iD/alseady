<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;
    protected $table = 'site_infos';
    protected $guarded = [];


    public function getNameAttribute()
    {
        if (app()->getLocale() == 'en')
            return $this->name_en ?? $this->name_ar;
        else
            return $this->name_ar;
    }
}
