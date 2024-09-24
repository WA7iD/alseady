<?php

namespace App\Models;

use App\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory, LanguageToggle;
    public $guarded = [];

    public function getNameAttribute()
    {
        return $this->t('name');
    }

    public function parent()
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Position::class, 'parent_id');
    }

    public function scopeIsTopLevel($query)
    {
        return $query->where('parent_id', null);
    }
}
