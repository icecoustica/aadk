@extends('layout')

@section('content')
<div class="content">
    <h1>Agensi Dadah Kebangsaan Smart Dashboard</h1>

    <div class="video-container">
        <iframe 
            src="https://www.youtube.com/embed/EmOcnp0qa9U?si=qPTkH6owb9zV4OxI"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
        </iframe>

        <iframe 
            src="https://www.thinglink.com/view/scene/2030605661686989668"
            type="text/html"
            webkitallowfullscreen mozallowfullscreen allowfullscreen scrolling="no">
        </iframe>
    </div>

    {{-- 
    <a href="{{ route('filament.admin.auth.login') }}" class="login-button">Log Masuk</a>
    --}}
</div>
@endsection
