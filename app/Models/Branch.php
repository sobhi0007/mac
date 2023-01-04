<?php

namespace App\Models;
use App\Models\Country;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table =  'branches';
 
    public $fillable = ['country_id'];

    public function country()
    {
     return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    public function employees()
    {
        return $this->hasMany(Employee::class,'branch_id','id')->where('id','!=',1);
    }
}
