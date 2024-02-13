@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3">Modifica "{{ $type['title'] }}"</h2>
            <div>
                <span>Oppure </span>
                <a href="{{ route('admin.types.index') }}" type="button" class="btn btn-info align-self-center ms-2">
                    Torna alla tabella delle Tipologie
                </a>
            </div>
        </div>
        <hr>
        <form class="row g-3" action="{{ route('admin.types.update', $type) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-12>
                <label for="Titolo" class="form-label">Nome</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="Titolo"
                    name="title" required value="{{ old('title', $type['title']) }}">
                @include('shared.error', ['field' => 'title'])
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Applica le modifiche</button>
            </div>
        </form>
        <div class="mt-3 d-flex justify-content-between">
            @include('shared.modal', [
                'modalRoute' => 'admin.types.destroy',
                'itemToDelete' => "$type[slug]",
                'itemName' => "$type[title]",
                'modalWarning' => true,
            ])
        </div>
    </div>
@endsection
