@extends('layouts.main.app')
@section('title', 'User| Create Daily Note')
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
                <form action="{{ route('user.daily-note.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                       id="exampleFormControlInput1" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="photo">Upload Foto</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                                       id="exampleFormControlInput1" accept="image/*">
                                @error('photo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="form-label" for="note">Catatan</label>
                            <textarea name="note" class="summernote @error('note') is-invalid @enderror" id="summernote" title="summernote">
                            </textarea>
                            @error('note')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>                   
                    </div>                   
                    <button type="submit" class="btn btn-theme">Simpan</button>
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