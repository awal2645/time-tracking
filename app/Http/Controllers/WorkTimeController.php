<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\WorkTimeService;
use Illuminate\Http\Request;
use DateTime;

class WorkTimeController extends Controller
{
    protected $workTimeService;

    public function __construct(WorkTimeService $workTimeService)
    {
        $this->workTimeService = $workTimeService;
    }

    public function register(Request $request)
    {
        $employee = Employee::find($request->input('employee_uuid'));

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $request->validate([
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after:start_datetime',
        ]);

        // Delegate to service
        $workTime = $this->workTimeService->registerWorkTime($employee, $request->only('start_datetime', 'end_datetime'));

        return response()->json(['message' => 'Work time has been added!']);
    }

    public function summary(Request $request)
    {
        $employee = Employee::find($request->input('employee_uuid'));

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $date = new DateTime($request->input('date'));

        // Delegate to service
        $summary = $this->workTimeService->getWorkTimeSummary($employee, $date);

        return response()->json($summary);
    }
}
