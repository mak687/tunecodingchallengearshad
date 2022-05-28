<?php

namespace App\Http\Controllers\API;

use App\Employee;

class EmployeeController extends \App\Http\Controllers\Controller
{
     public function index()
    {
        return Employee::all();
    }
 
    public function show($id)
    {
        $response =  Employee::find($id);
		
		if(empty($response)){
			return response()->json([
            'data' => 'Resource not found'
			], 404);
		}
		
		return $response;
    }
	
	//SHOW EVENT BY USER
	public function showEventByEmployee($sortby = 'employeeName',$order = 'ASC')
    {
		try{
			$employee = new Employee();

			$response = $employee->getAllEmployeesWithLogs($sortby,$order);
			
			if(empty($response)){
				return response()->json([
				'data' => 'Resource not found'
				], 404);
			}
			
			return $response;
		}catch(Exception $e){
			return response()->json([
				'data' => 'Resource not found'
				], 404);
		}
    }
}
