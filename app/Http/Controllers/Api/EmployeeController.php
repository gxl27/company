<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\GlobalSettings\GlobalSettings;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::joinDepartament()->active();
        $employees = $this->customSearchQuery($employees, $request);
        $employees = $employees->paginate(GlobalSettings::ITEMS_PER_PAGE);

        return $employees;
    }

    private function customSearchQuery($employees, Request $request)
    {
        if ($request->get('nume')) {
            $employees->where('employees.nume', 'Like', '%' . $request->get('nume') . '%');
        }
        if ($request->get('prenume')) {
            $employees->where('prenume', 'Like', '%' . $request->get('prenume') . '%');
        }
        if ($request->get('cnp')) {
            $employees->where('cnp', 'Like', '%' . $request->get('cnp') . '%');
        }
        if ($request->get('functie')) {
            $employees->where('functie', 'Like', '%' . $request->get('functie') . '%');
        }
        if ($request->get('departament')) {
            $employees->where('d.nume', 'Like', '%' . $request->get('departament') . '%');
        }
        if ($request->get('order')) {
            if($request->get('orderdirection') == 'desc'){
                $employees->orderBy($request->get('order'),  'DESC');
               
            }else{
                $employees->orderBy($request->get('order'));
            }
           
        }

        $employees->ordered();

        return $employees;

    }
    
}
