<?php

namespace UrlShortener\Http\Requests;

use UrlShortener\Http\Requests\Request;

class LinkStoreRequest extends Request
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
            'realurl' => 'required|url',
            'shorturl' => 'sometimes|string|regex:/[a-zA-Z0-9]/|unique:links,shorturl|size:7'
        ];
    }

    public function messages()
    {
        return [
            'realurl.required' => 'Please, fill Url field',
            'realurl.url' => 'Please, fill Url field with real address',
            'shorturl.regex' => 'Use only a-z, A-Z and 0-9 symbols',
            'shorturl.unique' => 'This shorturl has already been taken, choose another'
        ];
    }
}
