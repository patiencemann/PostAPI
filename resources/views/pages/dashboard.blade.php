@extends('layouts.app')

@section('title') dashboard @stop

@section('content')
    <x-nav-bar />

    <main class="flex">
        <aside id="sidebar-multi-level-sidebar" class="top-0 left-0 z-40 w-1/5 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r-2 border-gray-200" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
                <forlder-side-nav user="{{ json_encode(user()) }}" />
            </div>
        </aside>

        <div class="tabnets w-4/5">
            <div class="tabnet-1 flex">
                <aside id="sidebar-multi-level-sidebar" class="top-0 left-0 z-40 w-1/4 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r-2 border-gray-200" aria-label="Sidebar">
                    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
                        <render-requests />
                    </div>
                </aside>
                <div class="p-4 w-3/4">
                    <single-request />
                </div>
            </div>
        </div>
    </main>

@stop
