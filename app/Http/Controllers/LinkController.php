<?php
    namespace UrlShortener\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use UrlShortener\Http\Requests\LinkStoreRequest;
    use UrlShortener\Models\Advert;
    use UrlShortener\Models\Link;

    class LinkController extends Controller {
        public function __construct()
        {
        }

        public function index(Request $request)
        {
            return view('index', compact('request'));
        }

        public function store(LinkStoreRequest $request)
        {
            $realUrlCheckForUnique = Link::where('realurl', '=', rtrim($request->realurl, '/'))->orderBy('created_at', 'desc')->first();
            if (count($realUrlCheckForUnique) > 0 && !Auth::check()) {
                return redirect()->action('LinkController@show', [$realUrlCheckForUnique->shorturl]);
            }
            if ($request->shorturl && Auth::check()) {
                $shorturl = $request->shorturl;
            } else {
                $shorturl = str_random(7);
            }
            $userId = Auth::check() ? Auth::user()->id : 1;
            if (Link::create([
                'shorturl' => $shorturl,
                'realurl'  => rtrim($request->realurl, '/'),
                'user_id'  => $userId
            ])
            ) {
                return redirect('/' . $shorturl);
            }
            return redirect('/')->with('message', 'Something went wrong');
        }

        public function show($shorturl)
        {
            $advert = null;
            $adverts = Advert::where('active', 1)->whereColumn('views_count', '<=', 'bought_views_count')->get();
            if(count($adverts) > 0){
                $advert = $adverts->random(1);
                if($advert->views_count == $advert->bought_views_count -1){
                    $advert->update(['active' => 0]);
                }
                $advert->increment('views_count', 1);
            }
            $link = Link::where('shorturl', $shorturl)->firstOrFail();
            if (count($link) > 0) {
                $link->increment('views_count', 1);
                return view('links.show', compact('link', 'advert'));
            }
            return redirect('/')->with('message', 'Link you requested does not exists');
        }

        public function destroy($id)
        {
            $link = Link::findOrFail($id);
            $link->delete();
            return redirect('adminplace/links')->with('message', 'Link deleted');
        }

    }
