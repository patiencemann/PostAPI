@extends('layouts.app')

@section('title') documentation @stop

@section('style')
    <link rel="stylesheet" href="/css/documentation.css">
@stop

@section('content')
    <x-nav-bar />

    <div><global-alert /></div>
    <div><collection-distributor /></div>

    <div id="downloadable">
        <div class="section no-bottom-padding wf-section">
            <collection-compiler
                collection="{{ json_encode($collection) }}"
                author="{{ json_encode($collection->user) }}"
                owner="{{ Auth::check() && $collection->user->id == user()->id }}"
            />
        </div>
    </div>
@stop
