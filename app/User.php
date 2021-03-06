<?php
    namespace UrlShortener;

    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable {
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'is_admin',
            'avatar'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        public function links()
        {
            return $this->hasMany('UrlShortener\Models\Link');
        }
    }
