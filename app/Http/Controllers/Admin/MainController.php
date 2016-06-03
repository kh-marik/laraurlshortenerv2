<?php
    namespace UrlShortener\Http\Controllers\Admin;

    use UrlShortener\Http\Controllers\UserController;
    use UrlShortener\Http\Requests;
    use UrlShortener\Http\Controllers\Controller;
    use UrlShortener\Http\Requests\Admin\StoreProfileRequest;
    use UrlShortener\Http\Requests\LinkStoreRequest;
    use UrlShortener\Models\Link;
    use UrlShortener\User;

    class MainController extends Controller {
        protected $message = 'Something went wrong';

        public function __construct()
        {
        }

        public function index()
        {
            $totalLinks = Link::all()->count();
            $todaysLinks = Link::whereRaw('created_at >= CURDATE()')->count();
            $totalUsers = User::all()->count();
            $usersRegisteredToday = User::whereRaw('created_at >= CURDATE()')->count();
            return view('admin.index', compact('totalLinks', 'todaysLinks', 'totalUsers', 'usersRegisteredToday'));
        }

        public function links()
        {
            $links = Link::orderBy('created_at', 'desc')->get();
            return view('admin.links', compact('links'));
        }

        public function users()
        {
            $users = User::all();
            return view('admin.users', compact('users'));
        }

        public function editUserProfile($id)
        {
            $user = User::findOrFail($id);
            return view('admin.usersprofile', compact('user'));
        }

        public function storeUserProfile($id, StoreProfileRequest $request)
        {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $userController = new UserController();
            if (isset($request->is_admin) && $request->is_admin == 'on') {
                $user->is_admin = 1;
            }
            $user->is_admin = 0;
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $user->avatar = $userController->makeFileName($request);
                $userController->uploadAvatar($request);
            }
            if ($user->save()) {
                $this->message = 'User Profile Updated';
            }
            return redirect('adminplace/users')->with('message', $this->message);
        }

        public function editLink($id)
        {
            $link = Link::findOrFail($id);
            return view('admin.editlink', compact('link'));
        }

        public function storeLink($id, LinkStoreRequest $request)
        {
            $link = Link::findOrFail($id);
            $link->realurl = $request->realurl;
            $link->shorturl = $request->shorturl;
            $link->views_count = $request->views_count;
            $link->preview = isset($request->preview) ? 1 : 0;
            $link->advertise = isset($request->advertise) ? 1 : 0;
            if ($link->save()) {
                $this->message = 'Link updated';
            }
            return redirect('/adminplace/links')->with('message', $this->message);
        }

        public function advert()
        {
            return view('admin.advert');
        }
    }
