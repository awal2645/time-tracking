<?php


namespace App\Services;

use App\Models\Employee;
use App\Models\WorkTime;
use DateTime;

class WorkTimeService
{
    public function registerWorkTime(Employee $employee, array $data): WorkTime
    {
        $start_datetime = new DateTime($data['start_datetime']);
        $end_datetime = new DateTime($data['end_datetime']);
        $start_day = $start_datetime->format('Y-m-d');

        $workTime = new WorkTime([
            'start_datetime' => $start_datetime,
            'end_datetime' => $end_datetime,
            'start_day' => $start_day,
        ]);

        $employee->workTimes()->save($workTime);

        return $workTime;
    }

    public function getWorkTimeSummary(Employee $employee, DateTime $date)
    {
        $workTimes = $employee->workTimes()
            ->whereDate('start_day', $date->format('Y-m-d'))
            ->get();

        $totalHours = 0;

        foreach ($workTimes as $workTime) {
            $start = new DateTime($workTime->start_datetime);
            $end = new DateTime($workTime->end_datetime);

            $interval = $start->diff($end);
            $hours = $interval->h + ($interval->i / 60);
            $hours = round($hours * 2) / 2; // Rounding to the nearest 30 minutes

            $totalHours += $hours;
        }

        $rate = config('time-tracking.rate');
        $overtimeRate = config('time-tracking.overtime_rate');

        $normalHours = min($totalHours, config('time-tracking.monthly_hour_norm'));
        $overtimeHours = max($totalHours - config('time-tracking.monthly_hour_norm'), 0);

        $totalPay = ($normalHours * $rate) + ($overtimeHours * $rate * $overtimeRate);

        return [
            'total_hours' => $totalHours,
            'normal_hours' => $normalHours,
            'overtime_hours' => $overtimeHours,
            'total_pay' => $totalPay,
        ];
    }
}
