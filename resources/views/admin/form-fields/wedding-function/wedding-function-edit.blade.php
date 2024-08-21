@extends('admin.layouts.frontend')
@section('title', 'Wedding Functions')
@section('meta_description', 'Jim Corbett Wedding Functions')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">
            <div class="col-4">
                <div class="card my-4 shadow bg-body-tertiary br-1">
                    <h3 class="card-header">Wedding Functions Edit</h3>
                    <div class="card-body">
                        <form action="{{ route('wedding-function-update', ['id' => $weddingFunctions['id']]) }}" method="POST">
                           @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Wedding Functions Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $weddingFunctions['name'] }}"
                                    placeholder="Wedding Functions Name">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
