<?php
    namespace UrlShortener\Http\Controllers;

    use Illuminate\Support\Facades\Auth;
    use UrlShortener\Http\Requests;
    use UrlShortener\Http\Requests\StoreProfileRequest;
    use UrlShortener\Models\Link;
    use UrlShortener\User;

    class UserController extends Controller {
        public function __construct()
        {
        }

        public function cabinet()
        {
            return view('users.cabinet');
        }

        public function mylinks()
        {
            $links = Link::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            return view('users.mylinks', compact('links'));
        }

        public function profile()
        {
            return view('users.profile');
        }

        public function editProfile()
        {
            return view('users.editprofile');
        }

        public function destroy($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
            return view('adminplace/users')->with('message', 'User deleted');
        }

        public function storeProfile(StoreProfileRequest $request)
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $user->avatar = $this->makeFileName($request);
                $this->uploadAvatar($request);
            }
            if ($user->save()) {
                return redirect('cabinet/profile')->with('message', 'Profile updated');
            }
        }

        public function uploadAvatar($request)
        {
            $request->file('avatar')->move(public_path('images/avatars/'), $this->makeFileName($request));
        }

        public function makeFileName($request)
        {
            return 'avatar_' . Auth::user()->id . '_' . date('YmdHis') . '.' . $request->file('avatar')->guessClientExtension();
        }
    }