@extends('admin.layouts.app')

@section('panel')
<div class="container mt-5">
        <h2 class="mb-4">Upload Files</h2>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- File Input 1 -->
            <div class="mb-3">
                <label for="file_one" class="form-label">File One</label>
                <input type="file" class="form-control" id="file_one" name="file_one" required>
            </div>

            <!-- File Input 2 -->
            <div class="mb-3">
                <label for="file_two" class="form-label">File Two</label>
                <input type="file" class="form-control" id="file_two" name="file_two" required>
            </div>

            <button type="submit" class="btn btn-primary">Upload Files</button>
        </form>
    </div>

@endsection