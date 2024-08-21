@extends('admin.layouts.frontend')
@section('title', 'Edit Exclusion')
@section('meta_description', 'Jim Corbett Wedding Edit Exclusion')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Exclusion</h1>
        </div>

        <form method="post" action="{{ route('exclusion.edit', ['id' => $id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="description" class="form-label fw-bold">Exclusion</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ $feature }}" placeholder="Feature....">
                </div>
            </div>

            <div class="row my-4">
                <div class="d-flex gap-4">
                    <button style="width: 14rem" type="submit" class="btn btn-success btn-block">Save</button>

                    <a href="{{ route('exclusion.list.view') }}" class="btn btn-outline-dark btn-block">Back</a>
                </div>
            </div>

        </form>



    </main>
@endsection
