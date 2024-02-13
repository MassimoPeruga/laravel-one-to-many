@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        @include('shared.toast')
        <div class="row">
            <div class="col-12">
                <h2>Progetti {{ $type['title'] }} </h2>
            </div>
            <div class="col text-end mb-3">
                <a href="{{ route('admin.types.index') }}" type="button" class="btn btn-info align-self-center">
                    Torna alla tabella delle tipologie
                </a>
                <a href="{{ route('admin.types.edit', $type) }}" type="button" class="btn btn-warning mx-2">
                    Modifica questa tipologia
                </a>
                @include('shared.modal', [
                    'modalRoute' => 'admin.types.destroy',
                    'itemToDelete' => "$type[slug]",
                    'itemName' => "$type[title]",
                    'modalButton' => 'questa tipologia',
                    'modalWarning' => true,
                ])
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
                                <div class="text-end p-2">
                                    <a href="{{ route('admin.projects.show', $project) }}" type="button"
                                        class="btn btn-info btn-sm">
                                        Maggiori Dettagli
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" type="button"
                                        class="btn btn-warning btn-sm mx-2">
                                        Modifica
                                    </a>
                                    @include('shared.modal', [
                                        'modalClass' => 'btn-sm',
                                        'modalRoute' => 'admin.projects.destroy',
                                        'itemToDelete' => "$project[slug]",
                                        'itemName' => "$project[name]",
                                    ])
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
