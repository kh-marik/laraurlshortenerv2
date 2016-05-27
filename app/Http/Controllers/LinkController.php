<?php
    namespace UrlShortener\Http\Controllers;

    use UrlShortener\Http\Requests\LinkStoreRequest;

    class LinkController extends Controller {
        public function __construct()
        {
        }

        public function index()
        {
            return view('index');
        }

        public function store(LinkStoreRequest $request)
        {
        }

        public function show()
        {
            return view('links.show');
        }
    }
