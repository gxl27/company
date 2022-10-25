<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nume',
        'descriere',
        'status',
    ];

    protected $attributes = [
        'status' => 1
    ];

    public $timestamps = false;

    public function employees(){
        return $this->hasMany(Employee::class)->orderBy('nume');
     }

}
