@extends('layouts.app')

@section('title') published @stop

@section('style')
    <link rel="stylesheet" href="/css/bash.css">
@stop

@section('content')
    <x-nav-bar />

    <main>
        <div class="loop-section global-padding dark:bg-deep-green-800 pt-10">
            <div class="loop-wrap">
                @foreach ($collections as $collection)
                    <div><collection-card
                        collection="{{ json_encode($collection) }}"
                        author="{{ json_encode($collection->user) }}"
                    /></div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
