@extends('layouts.admin')

@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3">Aggiungi un nuvo progetto</h2>
            <div>
                <span>Oppure </span>
                <a href="{{ route('admin.projects.index') }}" type="button" class="btn btn-info align-self-center ms-2">
                    Torna alla tabella principale
                </a>
            </div>
        </div>
        <hr>
        <form class="row g-3" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-12>
                <label for="Titolo" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="Titolo" name="name"
                    required value="{{ old('name') }}">
                @include('shared.error', ['field' => 'name'])
            </div>
            <div class="col-6">
                <label for="Serie" class="form-label">Repository</label>
                <input type="text" class="form-control @error('repository') is-invalid @enderror" id="Serie"
                    name="repository" value="{{ old('repository') }}">
                @include('shared.error', ['field' => 'repository'])
            </div>

            <div class="col-2">
                <label for="Tipo" class="form-label">Tipo</label>
                <select id="Tipo" class="form-select @error('is_public') is-invalid @enderror" name="is_public">
                    @if (old('is_public') === 0)
                        <option value="1">Pubblica</option>
                        <option value="0" selected>Privata</option>
                    @else
                        <option value="1" selected>Pubblica</option>
                        <option value="0">Privata</option>
                    @endif
                </select>
                @include('shared.error', ['field' => 'is_public'])
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Immagine del progetto</label>
                    <input class="form-control" type="file" id="formFile" name="img">
                </div>
            </div>

            <div class="col-12">
                <label for="immagine" class="form-label">Link alla Repository</label>
                <input type="url" class="form-control @error('repo_url') is-invalid @enderror" id="immagine"
                    name="repo_url" value="{{ old('repo_url') }}">
                @include('shared.error', ['field' => 'repo_url'])
            </div>
            <div class="col-12">
                <label for="Descrizione" class="form-label">Assegnazione</label>
                <textarea class="form-control @error('assignment') is-invalid @enderror" id="Descrizione" rows="5"
                    name="assignment">
                    {{ old('assignment') }}
                </textarea>
                @include('shared.error', ['field' => 'assignment'])
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aggiungi ai progetti</button>
            </div>
        </form>
    </div>
@endsection
