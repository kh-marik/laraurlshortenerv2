<?php
    namespace UrlShortener\Http\Requests\Admin;

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
            if(Auth::user()->is_admin == '1'){
                return true;
            }
            return false;
        }

        public function rules()
        {
            return [
                'name'     => 'required|max:255',
                'password' => 'min:6|confirmed',
                'email'    => 'required|email|max:255|unique:users,email,'. $this->id,
                'avatar'   => 'image|dimensions:max_width=100,max_height=100'
            ];
        }

        public function messages()
        {
            return [
                'name.require'       => 'Name field required',
                'email.require'      => 'Email field required',
                'email.email'        => 'Email field must filled with valid email',
                'password.min'       => 'Password must have at least 6 characters',
                'password.confirmed' => 'Password confirmation error, try again',
                'avatar.image'       => 'Avatar must be valid image',
                'avatar.dimensions'  => 'Avatar must be maximum 100x100 px'
            ];
        }
    }
