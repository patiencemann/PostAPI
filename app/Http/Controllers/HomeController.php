<?php

    namespace App\Http\Controllers;

use App\Models\PostCollection;

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
    }
