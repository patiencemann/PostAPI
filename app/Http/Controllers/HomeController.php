<?php

    namespace App\Http\Controllers;

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
    }
