<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\User;

class Post extends Model
{
    protected $fillable = ['user_id', 'post'];

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
