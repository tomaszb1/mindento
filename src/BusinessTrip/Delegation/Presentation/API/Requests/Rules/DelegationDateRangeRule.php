<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Presentation\API\Requests\Rules;

use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Closure;
use Src\BusinessTrip\Delegation\Infrastructure\Models\DelegationEloquentModel;

class DelegationDateRangeRule implements DataAwareRule, ValidationRule
{
    protected $data = [];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $startDate = $this->data['start'];
        $endDate = $this->data['end'];

        $delegationExists = DelegationEloquentModel::query()
            ->where('user_id', '>=', $this->data['user_id'])
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($query) use ($startDate, $endDate) {
                    $query->where('start', '<=', $startDate)
                        ->where('end', '>=', $startDate);
                })->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start', '<=', $endDate)
                        ->where('end', '>=', $endDate);
                })->orWhere(function ($query) use ($startDate, $endDate) {
                    $query->where('start', '>=', $startDate)
                        ->where('end', '<=', $endDate);
                });
        })->exists();

        if (true === $delegationExists) {
            $fail('Delegation for this period exists');
        }
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }
}
