<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function scopeJoinDepartament($query)
    {
        $query = $query->join('departaments as d', 'employees.departament_id', '=', 'd.id')
            ->select('employees.*', 'd.nume as departament', 'd.descriere as departament_descriere');

        return $query;
    }

    public function scopeActive($query)
    {
        return $query->where('employees.status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderByRaw("nume, prenume");
    }

    public function scopeAverageByDepartament($query)
    {
        $query = $query->join('departaments as d', 'employees.departament_id', '=', 'd.id')
            ->selectRaw( 'd.nume as nume, ROUND(AVG(salariu),0) salariu_mediu')
            ->groupBy('d.nume');

        return $query;
    }

    // Relationship To Departament
    public function departament() {
        return $this->belongsTo(Departament::class, 'departament_id');
    }

}
