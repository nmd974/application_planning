<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users');
    }
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activities');
    }
}
