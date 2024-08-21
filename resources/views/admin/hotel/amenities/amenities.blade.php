@extends('admin.layouts.frontend')
@section('title', 'Amenities')
@section('meta_description', 'Jim Corbett Wedding Amenities List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Amenities</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('amenities.add.view.index') }}" class=" btn btn-success mt-4">Add Amenities</a>
                </div>
            </div>
        </div>



        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table tablesection border-light table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amenity</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($amenities as $amenity)
                            <tr>
                                <td>{{ $amenity['id'] }}</td>
                                <td>{{ $amenity['amenity'] }}</td>
                                <td><img src="{{ '/admin/uploads/amenity/' . $amenity['image'] }}" width="50px"
                                        height="50px" /></td>
                                <td>{{ $amenity['status'] == 1 ? 'Yes' : 'No' }}</td>
                                <td>

                                    <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                        role="group">
                                        <a href="{{ route('amenities.item.edit', $amenity['id']) }}" class="editbutton">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('amenities.delete', $amenity['id']) }}" method="POST">
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
                <p><b>Total records: {{ $amenities->total() }}, Displaying records {{ $amenities->firstItem() }} to
                        {{ $amenities->lastItem() }} of {{ $amenities->total() }}</b></p>
                {{ $amenities->links('pagination::bootstrap-4') }}
            </div>
        </div>






    </main>
@endsection
