<?php

namespace UrlShortener\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use UrlShortener\Http\Requests\Request;

class StoreAdvertRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->is_admin == '1'){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5| max:255',
            'bought_views_count' => 'required|numeric',
            'banner' => 'required|image|dimensions:width=728,height=90'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title required',
            'title.min' => 'Title must be minimum 5 characters',
            'title.max' => 'Title must be max 255 characters',
            'bought_views_count.required' => 'Tell what number of "Views" will be shown on site',
            'bought_views_count.numeric' => 'Fill field Bought views with numbers',
            'banner.required' => 'Banner required',
            'banner.image' => 'Banner must be image file',
            'banner.dimensions' => 'Banner must be 728x90 pixels'
        ];
    }
}
