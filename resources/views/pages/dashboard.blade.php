@extends('layouts.app')

@section('title') collections @stop

@section('content')
    <x-nav-bar />

    <main class="flex bg-white">
        <div><global-alert /></div>
        <div><collection-distributor /></div>

        <aside id="sidebar-multi-level-sidebar" class="top-0 left-0 z-40 w-1/5 p-2 h-[80vh] mb-2 mt-1 transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto rounded-[10px] border border-gray-200 transition delay-150 duration-700 ease-in-out bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:bg-gray-800">
                <collections-side-bar user="{{ json_encode(user()) }}" />
            </div>
        </aside>

        <div class="tabnets w-4/5">
            <div class="tabnet-1 flex">
                <div class="diff-requests-container"><list-collection-requests /></div>
                <div class="single-request-container"><single-request /></div>
            </div>
        </div>
    </main>
@stop
