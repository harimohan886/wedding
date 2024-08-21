@extends('admin.layouts.frontend')
@section('title', 'Wedding Venues')
@section('meta_description', 'Jim Corbett Wedding Venues')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">
            <div class="col-4">
                <div class="card my-4 shadow bg-body-tertiary br-1">
                    <h3 class="card-header">Venue Add</h3>
                    <div class="card-body">
                        <form action="{{ route('venue-store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Venue Name">
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
