<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConversionsPostConvertRequest extends FormRequest
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

    protected function prepareForValidation(){
        $this->merge([
            'roman' => \Converter::prepareRomanOverline(strtoupper($this->roman))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roman' => ['required', 'regex:/^(?=[MDCLXVIQWERTYU])U*(T[UY]|Y?T{0,3})(E[TR]|R?E{0,3})(Q[EW]|W?Q{0,3})M*(C[MD]|D?C{0,3})(X[CL]|L?X{0,3})(I[XV]|V?I{0,3})$/']
            
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }

    public function messages()
    {
        return [
            'roman.required'=> 'The roman field is required.',
            'roman.regex' => 'The roman is malformed or has invalid characters (accepted characters: I, V, X L, C, D, M, _I, _V, _X _L, _C, _D, _M)'
        ];
    }
}
