@extends('admin.layouts.frontend')
@section('title', 'My Account Details Settings')
@section('meta_description', 'Jim Corbett Wedding My Account Details Settings')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">My Account</h1>
        </div>

        <form method="post" action="{{ route('account.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="form-label fw-bold">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $name ?? '' }}"
                        placeholder="Full Name.." />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $email ?? '' }}"
                        placeholder="Email Address...." />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="image" class="form-label fw-bold">Popup Image</label>
                    <input type="file" class="form-control" id="image" name="image" value=""
                        placeholder="Image...">
                    <img src="/admin/auth/{{ $image }}" class="mt-4" alt="Popup Image" width="400px"
                        height="200px" />
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
