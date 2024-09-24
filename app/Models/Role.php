<?php

namespace App\Models;

use App\Traits\LanguageToggle;
use Laratrust\Models\Role as RoleModel;

class Role extends RoleModel
{
    use LanguageToggle;
    public $guarded = [];

    public function adminsCount()
    {
        return $this->admins()->where('role_id', $this->id)->count();
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'role_user', 'role_id', 'user_id');
    }

    public function getDisplayNameAttribute()
    {

        return $this->t('display_name');
    }
}
