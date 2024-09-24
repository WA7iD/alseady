<?php

namespace App\Models;

use App\Traits\LanguageToggle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, LanguageToggle;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    // public function getDescriptionAttribute()
    // {
    //     return $this->t('description');
    // }

    public  function scopeActive($query)
    {
        return $query->where('is_active', '1');
    }

    public function getIsInTheMainHubTitleAttribute($val)
    {
        if ($this->is_in_the_main_hub == 1) {
            return __('dashboard.Yes');
        } else {
            return __('dashboard.No');
        }
    }
}
