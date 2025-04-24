@extends('layouts.main.app')
@section('title', 'User| Update Daily Note')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
       Silahkan masukkan catatan anda.
    </h1>
    <!-- BEGIN #formControls -->
    <div id="formControls" class="mb-5">
        <div class="card">
            <div class="card-body pb-2">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('user.daily-note.update', $note->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', $note->date) }}" required>
                        </div>
                        <div class="col-xl-6 mb-3">
                            <label class="form-label">Ganti Foto (Opsional)</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            @if($note->photo)
                                <img src="{{ asset('storage/' . $note->photo) }}" alt="Foto Sebelumnya" width="100" class="mt-2">
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Catatan</label>
                        <textarea name="note" class="summernote @error('note') is-invalid @enderror" id="summernote" title="summernote">
                            {!!old('note', $note->note) !!}
                        </textarea>
                        {{-- <textarea name="note" class="form-control summernote">{{ old('note', $note->note) }}</textarea> --}}
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('user.daily-note.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
            <div class="hljs-container rounded-bottom">
                <pre><code class="xml" data-url="assets/data/form-elements/code-1.json"></code></pre>
            </div>
        </div>
    </div>
    <!-- END #formControls -->
</div>
@endsection