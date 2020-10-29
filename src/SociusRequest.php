<?php

namespace Grixu\SociusClient;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SociusRequest
 * @package App\Socius
 */
class SociusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'filters' => 'array',
            'filters.*' => 'array',
            'filters.*.field' => 'required|string',
            'filters.*.values' => 'required|array|min:1',
            'filters.*.values.*' => 'string',
            'sorts' => 'array',
            'sorts.*' => 'string',
            'includes' => 'array',
            'includes.*' => 'string'
        ];
    }
}
