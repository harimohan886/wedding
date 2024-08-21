@extends('admin.layouts.frontend')
@section('title', 'Jim Corbett Wedding Block Dates')
@section('meta_description', 'Jim Corbett Wedding Safari Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Jim Corbett Wedding Safari Block Date</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('blockdates.add.view.index') }}" class=" btn btn-success mt-4">Add Safari Block
                        Date</a>
                </div>
            </div>
        </div>
        <div class="top_fields">
            <div class="tabsection jungle ">
                <div class="table-responsive">
                    <table class="table tablesection border-light table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Zone</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $feature)
                                <tr>
                                    <td>{{ $feature['id'] }}</td>
                                    <td>{{ $feature['zone'] }}</td>
                                    <td>{{ $feature['from'] }}</td>
                                    <td>{{ $feature['to'] }}</td>
                                    <td>{{ $feature['message'] }}</td>
                                    <td>


                                        <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                            role="group">
                                            <a href="{{ route('blockdates.edit.view', $feature['id']) }}"
                                                class="editbutton">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('blockdates.delete', $feature['id']) }}" method="POST">
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
        </div>
    </main>
@endsection
