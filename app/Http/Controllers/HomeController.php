<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Employee;
use App\Models\Recipe;
use App\Services\GlobalSettings\GlobalSettings;

class HomeController extends Controller
{
  
    public function index() {

        // $departaments = Departament::paginate(GlobalSettings::ITEMS_PER_PAGE)->sortBy('nume');
        $employees = Employee::where('status', 1)->with('departament')->orderByRaw("nume, prenume")->paginate(GlobalSettings::ITEMS_PER_PAGE);
        // $recipe = Recipe::with('directions')->with('ingredients')->latest()->first();

        // $recipe = Recipe::with('directions')->with('ingredients')->latest()->first();

        return view('index', [
            // 'departaments' => $departaments,
            'employees' => $employees,
     
        ]
    );
        
    }
    
}
