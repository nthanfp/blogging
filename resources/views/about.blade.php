@extends('layouts.template')

@section('title', 'About')

@section('content')
<div class="mt-4 p-5 bg-primary text-white rounded">
    {{-- Ini comment --}}
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
</div>
@endsection
