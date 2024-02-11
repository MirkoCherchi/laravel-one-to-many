@extends('layouts.admin')

@section('content')
    <div class="container py-2">
        <h2 class="text-center">Inserisci Nuovo Progetto</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm my-3"><i
                class="fas fa-arrow-left me-1"></i>
            Torna in HomePage</a>

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Descrizione</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id=""
                    cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <select name="type_id" class="form-select @error('type_id') is-invalid @enderror">
                    <option selected>Seleziona un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                            {{ $type->title }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>
                Inserisci</button>
        </form>
    </div>
@endsection
