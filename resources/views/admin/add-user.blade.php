@extends('layouts.main.app')
@section('title', 'Admin| Add User')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
       Silahkan masukkan data user.
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
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                @error('role')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
                <form action="{{ route('admin.store-user') }}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" required placeholder="******">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Pilih Role</label>
                                <select name="role" class="form-select" id="exampleFormControlSelect1">
                                    <option value="director">Direktur</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>
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