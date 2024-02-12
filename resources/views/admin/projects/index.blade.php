@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        @include('shared.toast')
        <div class="row">
            <div class="col-12">
                <h2>I tuoi progetti</h2>
            </div>
            <div class="col text-end">
                <a href="{{ route('admin.projects.create') }}" type="button" class="btn btn-primary mb-3">
                    Aggiungi un nuovo progetto
                </a>
            </div>
        </div>
        <div class="bg-info-subtle rounded py-3">
            <table class="table table-borderless table-striped table-info align-middle m-0">
                <thead>
                    <tr>
                        <th scope="col" class="col-4">
                            <span class="p-2">
                                Nome
                            </span>
                        </th>
                        <th scope="col" class="col-3">
                            <span class="p-2">
                                Repository
                            </span>
                        </th>
                        <th scope="col" class="col-1">
                            <span class="p-2">
                                Visibilità
                            </span>
                        </th>
                        <th scope="col" class="col-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                <h5 class="m-2">{{ $project['name'] }}
                                    @if ($project->img)
                                        <i class="fa-solid fa-image"></i>
                                    @endif
                                </h5>
                            </td>
                            <td>
                                <a href="{{ $project['repo_url'] }}" class="mx-2 text-dark">
                                    {{ $project['repository'] }}
                                </a>
                            </td>
                            <td>
                                <span class="p-2">
                                    @if ($project['is_public'])
                                        Pubblica
                                    @else
                                        Privata
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="text-center p-2">
                                    <a href="{{ route('admin.projects.show', $project) }}" type="button"
                                        class="btn btn-info btn-sm">
                                        Maggiori Dettagli
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" type="button"
                                        class="btn btn-warning btn-sm mx-2">
                                        Modifica
                                    </a>
                                    @include('shared.modal', ['modalClass' => 'btn-sm'])
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
