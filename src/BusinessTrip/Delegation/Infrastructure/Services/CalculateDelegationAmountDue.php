<?php

namespace Src\BusinessTrip\Delegation\Infrastructure\Services;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Src\BusinessTrip\Delegation\Infrastructure\Models\DelegationEloquentModel;

class CalculateDelegationAmountDue
{
    private const MIN_HOURS = 8;

    public function calculate(DelegationEloquentModel $delegationEloquentModel): int
    {
        $start = $delegationEloquentModel->start;
        $end = $delegationEloquentModel->end;

        $period = CarbonPeriod::create(
            $start->format('Y-m-d'),
            $end->format('Y-m-d')
        );

        $firstDay = $this->calculateFirstDay(
            $period,
            $start,
            $end
        );

        $lastDay = $this->calculateLastDay(
            $period,
            $end
        );

        $otherDays = $this->calculateOtherDays(
            $start,
            $end
        );

        $validDays = $otherDays + $firstDay + $lastDay;

        return $this->calculateAmountDue(
            $validDays,
            $delegationEloquentModel
        );
    }

    private function calculateFirstDay(
        CarbonPeriod $period,
        Carbon $start,
        Carbon $end,
    ): int {
        $firstDay = $period->count() === 1
            ? $end->diff($start)->h >= self::MIN_HOURS && false === $start->isWeekend()
            : (new Carbon($start->format('Y-m-d')))->addDay()->diff($start)->h >= self::MIN_HOURS
            && false === $start->isWeekend();

        return (int) $firstDay;
    }

    private function calculateLastDay(
        CarbonPeriod $period,
        Carbon $end,
    ): int {
        $lastDay = $period->count() > 1
            ? $end->diff(new Carbon($end->format('Y-m-d')))->h >= self::MIN_HOURS
            && false === $end->isWeekend()
            : false;

        return (int) $lastDay;
    }

    private function calculateOtherDays(
        Carbon $start,
        Carbon $end,
    ): int {
        $period = CarbonPeriod::create(
            $start->format('Y-m-d'),
            $end->format('Y-m-d')
        )
            ->excludeStartDate()
            ->excludeEndDate()
            ->filter(fn ($date) => false === $date->isWeekend())
        ;

        return $period->count();
    }

    private function calculateAmountDue(
        int $validDays,
        DelegationEloquentModel $delegationEloquentModel,
    ): int {
        $amountDue = $validDays > 7
            ? ($delegationEloquentModel->countryCode->amount * 7)
            + ($validDays - 7) * $delegationEloquentModel->countryCode->amount * 2
            : $delegationEloquentModel->countryCode->amount * $validDays;

        return $amountDue / 100;
    }
}
