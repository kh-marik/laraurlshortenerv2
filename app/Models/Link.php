<?php
    namespace UrlShortener\Models;

    use Illuminate\Database\Eloquent\Model;

    class Link extends Model {
        protected $guarded = [];

        public function user()
        {
            return $this->belongsTo('UrlShortener\User');
        }
    }
