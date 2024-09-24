<?php

namespace App\Models;

use App\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, LanguageToggle;
    public $guarded = [];

    public  function scopeActive($query)
    {
        return $query->where('is_active', '1');
    }
    
    public function getTitleAttribute()
    {
        return $this->t('title');
    }
    public function getDescriptionAttribute()
    {
        return $this->t('description');
    }
    public function getIsActiveTitleAttribute()
    {
        return $this->is_active ? __("dashboard.active") : __("dashboard.in_active");
    }
}
