<?php
declare(strict_types=1);

namespace Src\BusinessTrip\Delegation\Presentation\API\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Src\BusinessTrip\Delegation\Presentation\API\Requests\Rules\DelegationDateRangeRule;

class DelegationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'start' => ['required', 'before:end', new DelegationDateRangeRule()],
            'end' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'message' => 'Some errors occurred',
            'errors' => $validator->errors()
        ]);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}
