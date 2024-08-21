@extends('admin.layouts.frontend')
@section('title', 'File Manager Page')
@section('meta_description', 'File Manager Page')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">File Manager</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Files:</h3>
                <ul>
                    @foreach ($files as $file)
                        <li>{{ $file }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Directories:</h3>
                <ul>
                    @foreach ($directories as $directory)
                        <li>
                            <a href="{{ route('page.management.manager.directory', ['directory' => $directory]) }}">
                                {{ $directory }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- File Upload Form -->
        <div class="mt-4">
            <h3>Upload File:</h3>
            <form action="{{ route('page.management.manager.upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
        </div>
    </main>
@endsection
