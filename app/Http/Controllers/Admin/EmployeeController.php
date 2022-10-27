<?php

namespace App\Http\Controllers\Admin;

use App\Models\Departament;
use App\Models\Employee;
use App\Services\GlobalSettings\GlobalSettings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  
    public function index() {

        $employees = Employee::where('status', 1)->with('departament')->orderByRaw("nume, prenume")->paginate(GlobalSettings::ITEMS_PER_PAGE);

        return view('admin/employee/index', [
            'employees' => $employees,
     
        ]
    );
        
    }
    
}
