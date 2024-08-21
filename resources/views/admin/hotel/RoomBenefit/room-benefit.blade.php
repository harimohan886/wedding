@extends('admin.layouts.frontend')
@section('title', 'Room Benefit')
@section('meta_description', 'Jim Corbett Wedding Room Benefit List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Room Benefit</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('benefit.add.view.index') }}" class=" btn btn-success mt-4">Add Room Benefit</a>
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
                        @foreach ($benefits as $benefit)
                            <tr>
                                <td>{{ $benefit['id'] }}</td>
                                <td>{{ $benefit['benefit'] }}</td>
                                <td>

                                    <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                        role="group">
                                        <a href="{{ route('benefit.item.edit.view', $benefit['id']) }}" class="editbutton">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('benefit.delete', $benefit['id']) }}" method="POST">
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
                <p><b>Total records: {{ $benefits->total() }}, Displaying records {{ $benefits->firstItem() }} to
                        {{ $benefits->lastItem() }} of {{ $benefits->total() }}</b></p>
                {{ $benefits->links('pagination::bootstrap-4') }}
            </div>
        </div>






    </main>
@endsection
