@extends('layouts.app')

@section('title') Home @stop

@section('content')
    <x-nav-bar />


    <section class="bg-white dark:bg-gray-900">
        <div class="flex max-w-screen-xl relative px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white font-anek">Building digital <br>products &amp; brands.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400 font-anek">This free and open-source landing page template was built using the utility classes from <a href="https://tailwindcss.com" class="hover:underline">Tailwind CSS</a> and based on the components from the <a href="https://flowbite.com/docs/getting-started/introduction/" class="hover:underline">Flowbite Library</a> and the <a href="https://flowbite.com/blocks/" class="hover:underline">Blocks System</a>.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('login') }}" class="inline-flex font-anek items-center justify-center w-full px-5 py-3 text-md font-bold text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        Signin | Signup
                    </a>
                </div>
            </div>
            <div class="absolute -right-2 top-6 lg:mt-0 max-w-[600px] lg:col-span-5 lg:flex">
                <img src="https://themewagon.github.io/landwind/images/hero.png" alt="hero image">
            </div>
        </div>
    </section>
    {{-- <x-social-lite /> --}}
@stop
