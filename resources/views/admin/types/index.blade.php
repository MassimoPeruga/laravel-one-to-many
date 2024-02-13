@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        @include('shared.toast')
        <div class="row">
            <div class="col-12">
                <h2>Tipi di progetti</h2>
            </div>
            <div class="col text-end">
                <a href="{{ route('admin.types.create') }}" type="button" class="btn btn-primary mb-3">
                    Aggiungi un nuovo tipo
                </a>
            </div>
        </div>
        <div class="bg-info-subtle rounded py-3">
            <table class="table table-borderless table-striped table-info align-middle m-0">
                <thead>
                    <tr>
                        <th scope="col">
                            <span class="p-2">
                                Nome
                            </span>
                        </th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>
                                <h5 class="m-2">{{ $type['title'] }}</h5>
                            </td>
                            <td>
                                <div class="text-end p-2">
                                    <a href="{{ route('admin.types.show', $type) }}" type="button"
                                        class="btn btn-info btn-sm">
                                        Progetti associati
                                    </a>
                                    <a href="{{ route('admin.types.edit', $type) }}" type="button"
                                        class="btn btn-warning btn-sm mx-2">
                                        Modifica
                                    </a>
                                    @include('shared.modal', [
                                        'modalClass' => 'btn-sm',
                                        'modalRoute' => 'admin.types.destroy',
                                        'itemToDelete' => "$type[slug]",
                                        'itemName' => "$type[title]",
                                        'modalWarning' => true,
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
