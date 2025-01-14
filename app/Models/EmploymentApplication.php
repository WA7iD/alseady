<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentApplication extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
