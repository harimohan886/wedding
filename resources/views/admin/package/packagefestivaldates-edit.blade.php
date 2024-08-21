@extends('admin.layouts.frontend')
@section('title', 'Edit Package Festival Date')
@section('meta_description', 'Jim Corbett Wedding Edit Package Festival Date')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Package Festival Date</h1>
        </div>

        <form method="post" action="{{ route('packagefestivaldates.edit', ['id' => $id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3">
                    <label for="start" class="form-label fw-bold">Start Date</label>
                    <input type="date" class="form-control" id="start" name="start" value="{{ $start }}"
                        placeholder="Start Date....">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <label for="end" class="form-label fw-bold">End Date</label>
                    <input type="date" class="form-control" id="end" name="end" value="{{ $end }}"
                        placeholder="End Date....">
                </div>
            </div>

            <div class="row my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block ">Save</button>

                    <a href="{{ route('packagefestivaldates.list.view') }}" class="btn btn-outline-dark btn-block ">Back</a>
                </div>
            </div>

        </form>



    </main>
@endsection
