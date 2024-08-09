<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function create(Request $request)
    {
        $employee = $this->employeeService->createEmployee($request->only('first_name', 'last_name'));

        return response()->json(['uuid' => $employee->id]);
    }
}

