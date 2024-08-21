@extends('admin.layouts.frontend')
@section('title', 'festival date range List')
@section('meta_description', 'Pench Price festival date range List')
@section('content')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Festival {{ $mode }}</h1>
          <a href="{{ route('festival-date-range-add', ['id'=> 'Create','mode' => $mode, 'type' => $type]) }}" class="col-sm-2 btn btn-success">Add</a>
    </div>
        <div class="top_fields">

          <div class="tabsection jungle">
            <div class="table-responsive">
              <table class="table border-light tablesection">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date Start</th>
                    <th scope="col">Date End</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($prices as $price)
                      <tr>
                          <td>{{ $price['id'] }}</td>
                          <td>{{ $price['start'] }}</td>
                          <td>{{ $price['end'] }}</td>
                          <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('festival-date-range-add', ['id' => $price['id'], 'mode' => $mode, 'type' => $type]) }}" class="btn btn-warning" style="height: 9%; margin-top: 30%; margin-right: 10%;"><i class="bi bi-pen"></i></a>
                            </div>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>

      </main>

@endsection
