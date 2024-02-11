@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary  text-white">
                        <h5 class="m-0"><i class="fas fa-edit me-1"></i>Modifica Progetto: {{ $project->title }}</h5>
                    </div>

                    <div class="card-body">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm mb-3"><i
                                class="fas fa-arrow-left me-1"></i>Torna indietro</a>
                        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $project->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                    rows="6">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>
                                Modifica</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
