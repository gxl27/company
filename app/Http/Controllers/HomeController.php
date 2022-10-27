<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Employee;
use App\Services\GlobalSettings\GlobalSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function index(Request $request) {

        $employees = Employee::query()->active();
        $employeesCount = $employees->count();

        $departaments = Departament::query()->active();
        $departamentsCount = $departaments->count();

        return view('index', [
            
            'employeesCount' => $employeesCount,
            'departamentsCount' => $departamentsCount,
     
        ]
    );
        
    }
    
}
