@extends('layouts.app')

@section('title') documentation @stop

@section('style')
    <link rel="stylesheet" href="/css/documentation.css">
@stop

@section('content')
    <x-nav-bar />

    <div><pop-message /></div>
    <div><global-collection /></div>

    <div id="downloadable">
        <div class="section no-bottom-padding wf-section">
            <compile-collection
                collection="{{ json_encode($collection) }}"
                author="{{ json_encode($collection->user) }}"
            />
        </div>
    </div>
@stop
