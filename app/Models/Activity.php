<?php

namespace App\Models;

use App\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory, LanguageToggle;
    protected $guarded = [];

  public function images()
{
    return $this->hasMany(ActivityImage::class);
}


    public function getTitleAttribute()
    {
        return $this->t('title');
    }

    public function getDescriptionAttribute()
    {
        return $this->t('description');
    }
}
