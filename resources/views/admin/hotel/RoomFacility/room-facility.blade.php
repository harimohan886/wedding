@extends('admin.layouts.frontend')
@section('title', 'Room Facility')
@section('meta_description', 'Jim Corbett Wedding Room Facility List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Room Facility</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('facility.add.view.index') }}" class=" btn btn-success mt-4">Add Room Facility</a>
                </div>
            </div>
        </div>



        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table tablesection border-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Facility</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facilities as $facility)
                            <tr>
                                <td>{{ $facility['id'] }}</td>
                                <td>{{ $facility['facility'] }}</td>
                                <td>

                                    <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                        role="group">
                                        <a href="{{ route('facility.item.edit.view', $facility['id']) }}"
                                            class="editbutton">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('facility.delete', $facility['id']) }}" method="POST">
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
                <p><b>Total records: {{ $facilities->total() }}, Displaying records {{ $facilities->firstItem() }} to
                        {{ $facilities->lastItem() }} of {{ $facilities->total() }}</b></p>
                {{ $facilities->links('pagination::bootstrap-4') }}
            </div>
        </div>






    </main>
@endsection
