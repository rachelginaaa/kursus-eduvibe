@extends('layout')

@section('title', 'Bahasa Indonesia')

@section('content')
<h1 class="fw-bold text-primary mb-4">Mata Pelajaran: Bahasa Indonesia</h1>

@foreach ($mapel as $item)
    <div class="card p-4 mb-3">
        <h4 class="fw-bold">{{ $item->judul }}</h4>
        <p>{{ $item->deskripsi }}</p>
    </div>
@endforeach

@endsection
