@extends('admin.layouts.frontend')
@section('title', 'Add Safari Block Date')
@section('meta_description', 'Jim Corbett Wedding Add Safari Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Chambal Safari Block Date</h1>
        </div>
        <form method="post" action="{{ route('chambal.blockdate.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-4 mb-2">
                    <label for="block_date" class="form-label fw-bold">Block Date</label>
                    <input type="date" class="form-control" id="block_date" name="block_date" value=""
                        placeholder="Block Date....">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="status" class="form-label">Availability</label>
                    <select class="form-select" id="status" aria-label="Select availability" name="status">
                        <option value="">Select Availability</option>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block btn-lg">
                        Save
                    </button>
                    <a href="{{ route('chambal-blockdate') }}" class="btn btn-outline-dark btn-block btn-lg">
                        Back
                    </a>
                </div>
            </div>
        </form>
    </main>
@endsection
