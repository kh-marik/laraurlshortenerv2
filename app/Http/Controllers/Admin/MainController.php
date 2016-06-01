<?php
    namespace UrlShortener\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use UrlShortener\Http\Requests;
    use UrlShortener\Http\Controllers\Controller;

    class MainController extends Controller {
        public function __construct()
        {
        }

        public function index()
        {
            return view('admin.index');
        }

        public function links()
        {
            return view('admin.links');
        }

        public function users()
        {
            return view('admin.users');
        }

        public function advert()
        {
            return view('admin.advert');
        }

    }
