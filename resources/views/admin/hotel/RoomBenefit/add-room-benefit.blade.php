@extends('admin.layouts.frontend')
@section('title', 'Add Room Benefit')
@section('meta_description', 'Jim Corbett Wedding Room Benefit List Add Room Benefit')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Room Benefit</h1>
        </div>

        <form method="post" action="{{ route('add-benefit-add-item') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="form-label fw-bold">Benefit</label>
                    <input type="text" class="form-control" id="name" name="name" value=""
                        placeholder="Benefit....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block ">Save</button>

                    <a href="{{ route('room.benefit-list') }}" class="btn btn-outline-dark btn-block ">Back</a>
                </div>
            </div>

        </form>



    </main>
@endsection
