<?php

    namespace App\Http\Controllers;

    use App\Models\PostCollection;
    use Illuminate\Support\Facades\Auth;

    class HomeController extends Controller {
        /**
         * Show the home page
         *
         * @return \Illuminate\Http\Response
         */
        public function home() {
            return view('pages.index');
        }

        /**
         * Show the login page
         *
         * @return \Illuminate\Http\Response
         */
        public function login() {
            if(Auth::check()) return redirect()->route('dashboard');
            return view('pages.login');
        }

        /**
         * Show the dashboard page
         *
         * @return \Illuminate\Http\Response
         */
        public function dashboard() {
            return view('pages.dashboard');
        }

        /**
         * Show the dashboard page
         *
         * @return \Illuminate\Http\Response
         */
        public function documentation(PostCollection $collection) {
            $collection->with(['user']);

            return view('pages.documentation', compact('collection'));
        }

        /**
         * Show the dashboard page
         *
         * @return \Illuminate\Http\Response
         */
        public function published() {
            $collections = PostCollection::with('user')
                                ->where('published', true)
                                ->orderBy('created_at', 'desc')
                                ->get();

            return view('pages.published', compact('collections'));
        }
    }
