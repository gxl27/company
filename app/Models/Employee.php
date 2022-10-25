<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    const STATUS = [
        0 => 'deleted',
        1 => 'active'
    ];

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nume',
        'prenume',
        'cnp',
        'functie',
        'salariu',
        'zile_concediu',
        'status',
        'departament_id'
    ];

    protected $attributes = [
        'status' => 1
    ];

    public function getStatusFormatedAttribute() 
    {
        return self::STATUS[$this->status];
    }

    // Relationship To Departament
    public function departament() {
        return $this->belongsTo(Departament::class, 'departament_id');
    }

}
