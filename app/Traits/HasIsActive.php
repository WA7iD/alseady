<?php

namespace App\Traits;

trait HasIsActive
{

    public function getIsActiveTitleAttribute()
    {
        return $this->is_active ? __("dashboard.active") : __("dashboard.in_active");
    }

}
