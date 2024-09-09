{{-- @extends('layout')
@section('header')
    <h1>Banner</h1>
@endsection
@section('content')
    @foreach ($posts as $post)
        <article>
            <a href="/post/<?= $post->slug ?>">
                <h1> <?= $post->title ?> </h1>
                <div> {!! $post->body !!} </div>
        </article>
    @endforeach
@endsection --}}

<x-layout>
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <a href="/post/<?= $post->slug ?>">
                    <h1> <?= $post->title ?> </h1>
                    <div> {!! $post->body !!} </div>
            </article>
        @endforeach
    </x-slot>
</x-layout>
