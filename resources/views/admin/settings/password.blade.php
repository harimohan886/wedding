@extends('admin.layouts.frontend')
@section('title', 'Change Account Password Settings')
@section('meta_description', 'Jim Corbett Wedding Change Account Password Settings')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Change Password</h1>
        </div>

        <form method="post" action="{{ route('password.settings.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="current_password" class="form-label fw-bold">Current password*</label>
                    <input type="password" class="form-control" id="current_password" name="current_password"
                        placeholder="Current password*...." />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="new_password" class="form-label fw-bold">New password*</label>
                    <input type="password" class="form-control" id="new_password" name="new_password"
                        placeholder="New password*...." />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-12">
                    <label for="new_password_confirmation" class="form-label fw-bold">New password confirmation*</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" placeholder="New password confirmation*...." />
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
