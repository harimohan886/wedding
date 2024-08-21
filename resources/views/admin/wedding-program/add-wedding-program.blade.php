@extends('admin.layouts.frontend')
@section('title', 'Wedding Program Create')
@section('meta_description', 'Jim Corbett Wedding Program Create')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">
            <div class="col-6">
                <div class="card my-4 shadow bg-body-tertiary br-1">
                    <div class="card-header m-0 py-0">
                        <div class="d-flex justify-content-between p-2 ">
                            <h3>Wedding Program Gallery Create</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store-wedding-program') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Venue Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="Choose Image" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" selected>Choose Status</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
