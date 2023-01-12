<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone', 'email', 'add1', 'add2', 'city', 'postal', 'created_at', 'updated_at'];
}
