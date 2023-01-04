<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class Employee extends Authenticatable 
{
    use HasFactory;
    use HasRoles;
    use Notifiable;
    protected $guard = "employee";

    protected $fillable = [
        'name',
        'email',
        'lang_id',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


 
}