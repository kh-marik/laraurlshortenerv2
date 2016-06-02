<?php
    namespace UrlShortener\Http\Controllers\Admin;

    use UrlShortener\Http\Controllers\UserController;
    use UrlShortener\Http\Requests;
    use UrlShortener\Http\Controllers\Controller;
    use UrlShortener\Models\Link;
    use UrlShortener\User;

    class MainController extends Controller {
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

        public function storeUserProfile($id, Requests\Admin\StoreProfileRequest $request)
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
            $message = 'Something went wrong!';
            if ($user->save()) {
                $message = 'User Profile Updated';
            }
            return redirect('adminplace/users')->with('message', $message);
        }

        public function advert()
        {
            return view('admin.advert');
        }

    }
