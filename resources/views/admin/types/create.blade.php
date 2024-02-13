@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3">Aggiungi una nuva tipologia</h2>
            <div>
                <span>Oppure </span>
                <a href="{{ route('admin.types.index') }}" type="button" class="btn btn-info align-self-center ms-2">
                    Torna alla tabella delle tipologie
                </a>
            </div>
        </div>
        <hr>
        <form class="row g-3" action="{{ route('admin.types.store') }}" method="POST">
            @csrf

            <div class="col-12>
                <label for="Titolo" class="form-label">Nome</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="Titolo"
                    name="title" required value="{{ old('title') }}">
                @include('shared.error', ['field' => 'title'])
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aggiungi alle Tipologie</button>
            </div>
        </form>
    </div>
@endsection
