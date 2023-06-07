<?php

namespace App\Http\Requests;

use App\Models\HealthFacilities;
use Illuminate\Foundation\Http\FormRequest;

class HealthFacilitiesRequest extends FormRequest
{
    protected HealthFacilities $healthFacilities;

    public function __construct()
    {
        $this->healthFacilities = new HealthFacilities();
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return $this->healthFacilities->getRules();
    }
}
