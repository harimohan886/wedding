@extends('admin.layouts.frontend')
@section('title', 'Package Festival Date')
@section('meta_description', 'Jim Corbett Wedding Package Festival Date')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Package Festival Date</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('packagefestivaldates.add.view.index') }}" class=" btn btn-success mt-4">Add Package
                        Festival Date</a>
                </div>
            </div>
        </div>
        <div class="top_fields">

            <div class="tabsection jungle">
                <div class="table-responsive">
                    <table class="table border-light tablesection">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                                <tr>
                                    <td>{{ $feature['id'] }}</td>
                                    <td>{{ $feature['start'] }}</td>
                                    <td>{{ $feature['end'] }}</td>
                                    <td>

                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('packagefestivaldates.edit.view', $feature['id']) }}"
                                                class="editbutton">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('packagefestivaldates.delete', $feature['id']) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mt-0 py-2 px-3">
                                                    <span data-feather="trash"></span>
                                                </button>
                                            </form>
                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <p><b>Total records: {{ $features->total() }}, Displaying records {{ $features->firstItem() }} to
                            {{ $features->lastItem() }} of {{ $features->total() }}</b></p>
                    {{ $features->links('pagination::bootstrap-4') }}
                </div>
            </div>




    </main>

@endsection
