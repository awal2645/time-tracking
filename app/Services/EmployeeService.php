<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function createEmployee(array $data): Employee
    {
        return Employee::create($data);
    }
}
