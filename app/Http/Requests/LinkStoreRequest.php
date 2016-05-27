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
            'realurl' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'realurl.required' => 'Please, fill Url field',
            'realurl.url' => 'Please, fill Url field with real address',
        ];
    }
}
