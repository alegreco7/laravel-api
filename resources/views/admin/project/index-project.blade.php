@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-gap-3">
            <div class="col-12 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h1>POJECTS</h1>
                    </div>
                    <div class="">
                        <a class="btn btn-warning" href="{{ route('admin.project.create') }}">Add project</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <th>Nome</th>
                        <th>Tipologia</th>
                        <th>Tecnologia</th>
                        <th>Data Creazione</th>
                        <th>Data Fine</th>
                        <th>Strumenti</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->type ? $project->type->name : 'Nessun tipo' }}</td>
                                <td>
                                    @forelse ($project->technologies as $tech)
                                        <span class="badge rounded-pill text-bg-{{ $tech->class_color }}">
                                            {{ $tech->name }}</span>
                                    @empty
                                        Nessuna tecnologia
                                    @endforelse
                                </td>
                                <td>{{ $project->start_date }}</td>
                                <td>{{ $project->end_date }}</td>
                                <td>
                                    <div class="mt-2 d-flex gap-2">
                                        <a href="{{ route('admin.project.show', ['project' => $project]) }}"
                                            class="btn btn-sm btn-primary">Visualizza</a>
                                        <a href="{{ route('admin.project.edit', ['project' => $project]) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.project.destroy', ['project' => $project]) }}"
                                            method="post"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo project')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
