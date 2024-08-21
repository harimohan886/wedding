@extends('admin.layouts.frontend')
@section('title', 'News Details Settings')
@section('meta_description', 'Jim Corbett Wedding News Details Settings')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Latest News</h1>
        </div>

        <form method="post" action="{{ route('news.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="news" class="form-label fw-bold">News</label>
                    <textarea type="text" class="form-control" id="news" name="news" value="" placeholder="News....">{{ $news ?? '' }}</textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="status" class="form-label fw-bold">Show Popup</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">--Select--</option>
                        <option value="1" @if ($status == '1') selected @endif>Yes</option>
                        <option value="0" @if ($status == '0') selected @endif>No</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="image" class="form-label fw-bold">Popup Image</label>
                    <input type="file" class="form-control" id="image" name="image" value=""
                        placeholder="Image...">
                    <img src="/admin/auth/{{ $image }}" alt="Popup Image" width="400px" height="200px" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                </div>
            </div>

        </form>



    </main>
@endsection
