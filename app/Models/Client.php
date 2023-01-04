<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasFactory;

    protected $guard = "client";

    protected $fillable = [
        'name',
        'email',
        'lang_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


   
}