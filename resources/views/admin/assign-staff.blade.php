@extends('layouts.main.app')
@section('title', 'Admin| Assign Staff')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
       Berikan relasi/ hubungan antara staf dan manajernya.
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
                <form action="{{ route('admin.staff-manager.store') }}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Pilih Manager</label>
                                <select name="manager_id" class="form-select" id="exampleFormControlSelect1">
                                    @foreach($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="exampleFormControlSelect1">Pilih Staff</label>
                                <select name="staff_ids[]" class="form-select" id="exampleFormControlSelect1">
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-theme">Hubungkan</button>
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