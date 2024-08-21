@extends('admin.layouts.frontend')
@section('title', 'Add Terms')
@section('meta_description', 'Jim Corbett Wedding Add Terms')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Terms</h1>
        </div>

        <form method="post" action="{{ route('terms.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="description" class="form-label fw-bold">Terms</label>
                    <input type="text" class="form-control" id="description" name="description" value=""
                        placeholder="Terms....">
                </div>
            </div>

            <div class="row my-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>

                    <a href="{{ route('terms.list.view') }}" class="btn btn-outline-dark btn-block btn-lg">Back</a>
                </div>
            </div>

        </form>



    </main>
@endsection
