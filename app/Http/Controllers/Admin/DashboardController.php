<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        return view('dashboard');
    }


    public function getAllEmployees(){

        try{

			
			$employee = new Employee();
           
			//SORTING
			$sortBy = isset($_POST['sortBy'])?$_POST['sortBy']:'employeeName';
			$order  = isset($_POST['listingOrder'])?$_POST['listingOrder']:'ASC';
		   
			//GET SORTED EMPLOYEE DATA
		    $employees 	= $employee->getAllEmployeesWithLogs($sortBy,$order);
			
            $view 	= view("partials\users\getall",compact('employees','sortBy','order'))->render();

             return response()->json(['html' => $view]);
			
		}catch(\Exception $e){
			return response()->json($e->getMessage());
		}        
        
      
    }
}
