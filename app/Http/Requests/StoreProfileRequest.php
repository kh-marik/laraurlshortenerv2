<?php
    namespace UrlShortener\Http\Requests;

    use Illuminate\Support\Facades\Auth;
    use UrlShortener\Http\Requests\Request;

    class StoreProfileRequest extends Request {
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
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
                'password' => 'min:6|confirmed',
                'avatar' => 'image|dimensions:max_width=100,max_height=100'
            ];
        }

        public function messages()
        {
            return [
                'name.require' => 'Name field required',
                'email.require' => 'Email field required',
                'email.email' => 'Email field must filled with valid email',
                'email.unique' => 'Email must be unique, this email reserved by another user',
                'password.min' => 'Password must have at least 6 characters',
                'password.confirmed' => 'Password confirmation error, try again',
                'avatar.image' => 'Avatar must be valid image',
                'avatar.dimensions' => 'Avatar must be maximum 100x100 px'
            ];
        }
    }
