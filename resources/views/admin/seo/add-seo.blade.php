@extends('admin.layouts.frontend')
@section('title', 'Add SEO')
@section('meta_description', 'Jim Corbett Wedding Add SEO')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Seo</h1>
        </div>

        <form method="post" action="{{ route('seo.manager.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="url" class="form-label fw-bold">URL</label>
                    <input type="text" class="form-control" id="url" name="url" value=""
                        placeholder="URL..">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                        placeholder="Meta Title....">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                    <input type="text" class="form-control" id="meta_description" name="meta_description" value=""
                        placeholder="Meta Description..">
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
