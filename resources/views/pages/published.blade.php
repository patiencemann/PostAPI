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
                <article class="item is-loop is-image" key="doc.id">
                    <div class="item-image global-image global-image-orientation global-radius is-landscape bg-gray-300">
                        <a href="'/docs/'+doc.slug" class="global-link" aria-label="doc.title"></a>
                        <img src="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80" loading="lazy" alt="doc.title"
                            srcset="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 300w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 600w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 1200w'"
                            sizes="(max-width:480px) 300px, (max-width:768px) 600px, 1200px">
                    </div>
                    <div class="item-content">
                        <h4 class="item-title" style="margin-top: 1.3rem"><a href="'/docs/'+doc.slug" class="dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, laboriosam.</a></h4>
                        <p class="item-excerpt dark:text-gray-200">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet soluta doloremque rem deleniti hic laudantium blanditiis accusantium dolorem quibusdam culpa.</p>
                    </div>
                </article>
                <article class="item is-loop is-image" key="doc.id">
                    <div class="item-image global-image global-image-orientation global-radius is-landscape bg-gray-300">
                        <a href="'/docs/'+doc.slug" class="global-link" aria-label="doc.title"></a>
                        <img src="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80" loading="lazy" alt="doc.title"
                            srcset="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 300w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 600w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 1200w'"
                            sizes="(max-width:480px) 300px, (max-width:768px) 600px, 1200px">
                    </div>
                    <div class="item-content">
                        <h4 class="item-title" style="margin-top: 1.3rem"><a href="'/docs/'+doc.slug" class="dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, laboriosam.</a></h4>
                        <p class="item-excerpt dark:text-gray-200">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet soluta doloremque rem deleniti hic laudantium blanditiis accusantium dolorem quibusdam culpa.</p>
                    </div>
                </article>
                <article class="item is-loop is-image" key="doc.id">
                    <div class="item-image global-image global-image-orientation global-radius is-landscape bg-gray-300">
                        <a href="'/docs/'+doc.slug" class="global-link" aria-label="doc.title"></a>
                        <img src="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80" loading="lazy" alt="doc.title"
                            srcset="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 300w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 600w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 1200w'"
                            sizes="(max-width:480px) 300px, (max-width:768px) 600px, 1200px">
                    </div>
                    <div class="item-content">
                        <h4 class="item-title" style="margin-top: 1.3rem"><a href="'/docs/'+doc.slug" class="dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, laboriosam.</a></h4>
                        <p class="item-excerpt dark:text-gray-200">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet soluta doloremque rem deleniti hic laudantium blanditiis accusantium dolorem quibusdam culpa.</p>
                    </div>
                </article>
                <article class="item is-loop is-image" key="doc.id">
                    <div class="item-image global-image global-image-orientation global-radius is-landscape bg-gray-300">
                        <a href="'/docs/'+doc.slug" class="global-link" aria-label="doc.title"></a>
                        <img src="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80" loading="lazy" alt="doc.title"
                            srcset="https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 300w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 600w,
                                    https://images.unsplash.com/photo-1684394944541-c57e2df37ebb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2232&q=80 1200w'"
                            sizes="(max-width:480px) 300px, (max-width:768px) 600px, 1200px">
                    </div>
                    <div class="item-content">
                        <h4 class="item-title" style="margin-top: 1.3rem"><a href="'/docs/'+doc.slug" class="dark:text-gray-200">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, laboriosam.</a></h4>
                        <p class="item-excerpt dark:text-gray-200">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet soluta doloremque rem deleniti hic laudantium blanditiis accusantium dolorem quibusdam culpa.</p>
                    </div>
                </article>
            </div>
        </div>
    </main>
@endsection
