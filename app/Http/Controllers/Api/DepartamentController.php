<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\GlobalSettings\GlobalSettings;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    public function index(Request $request)
    {
        $departaments = Employee::averageByDepartament()->active();
        $departaments = $this->customSearchQuery($departaments, $request);
        $departaments = $departaments->paginate(GlobalSettings::ITEMS_PER_PAGE);

        return $departaments;
    }

    private function customSearchQuery($departaments, Request $request)
    {
        
        if ($request->get('nume')) {
            $departaments->where('d.nume', 'Like', '%' . $request->get('nume') . '%');
        }
        if ($request->get('order')) {
            if ($request->get('orderdirection') == 'desc') {

                $departaments->orderBy($request->get('order'),  'DESC');
               
            }else{
                $departaments->orderBy($request->get('order'));
            }
           
        }

        $departaments->orderBy('d.nume');

        return $departaments;

    }
    
}
