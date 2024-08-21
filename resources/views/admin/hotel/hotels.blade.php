@extends('admin.layouts.frontend')
@section('title', 'Hotels')
@section('meta_description', 'Jim Corbett Wedding Hotels List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Hotels</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('hotel.list.item.add.index') }}" class=" btn btn-success mt-4">Add Hotel</a>
                </div>
            </div>
        </div>

        <div class="top_fields">

            <form method="get" action="{{ route('hotel-list') }}">
                <div class="row">
                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="hotel_name" class="form-label">Hotel Name</label>
                        <input type="text" class="form-control" id="hotel_name" name="hotel_name"
                            value="{{ $hotel_name ?? '' }}" placeholder="Hotel name....">
                    </div>
                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="hotel_rating" class="form-label">Hotel Rating</label>
                        <select class="form-select" id="hotel_rating" name="hotel_rating">
                            <option value="" {{ $hotel_rating === '' ? 'selected' : '' }}>Select Rating</option>
                            <option value="3" {{ $hotel_rating === '3' ? 'selected' : '' }}>3 Star</option>
                            <option value="4" {{ $hotel_rating === '4' ? 'selected' : '' }}>4 Star</option>
                            <option value="5" {{ $hotel_rating === '5' ? 'selected' : '' }}>5 Star</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 mb-3">
                        <label for="availability" class="form-label">Availability</label>
                        <select class="form-select" id="availability" name="availability">
                            <option value="" {{ $availability === '' ? 'selected' : '' }}>Select Availability</option>
                            <option value="1" {{ $availability === '1' ? 'selected' : '' }}>Availability</option>
                            <option value="0" {{ $availability === '0' ? 'selected' : '' }}>Not Availability</option>
                        </select>
                    </div>

                    <div class="d-flex align-items-end gap-3 col-lg-3 col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('hotel-list') }}" class="btn btn-primary">Clear Filter</a>
                    </div>


                </div>
            </form>

            <div class="tabsection jungle">
                <div class="tablebox">
                    <table class="table tablesection border-light">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->price }}</td>
                                    <td>{{ $hotel->address }}</td>
                                    <td>{{ $hotel->rating }}</td>
                                    <td>
                                        <label class="switch availability-switch"
                                            onchange="checkAvailability({{ $hotel->id }});">
                                            <input type="checkbox" {{ $hotel->status == 1 ? 'checked' : '' }}
                                                data-val="{{ $hotel->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('hotel-list.item.edit', $hotel->id) }}"><i
                                                            class="bi bi-pencil-fill"></i> Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('hotel-list.item.amenities', $hotel->id) }}"><i
                                                            class="bi bi-building"></i> Hotel Amenities</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('hotel-list.item.rooms', $hotel->id) }}"><i
                                                            class="bi bi-house"></i> Hotel Rooms</a></li>
                                                <li>
                                                    <form action="{{ route('hotel-list.item.delete', $hotel->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item" role="button"><i
                                                                class="bi bi-trash"></i> Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    <p><b>Total records: {{ $hotels->total() }}, Displaying records {{ $hotels->firstItem() }} to
                            {{ $hotels->lastItem() }} of {{ $hotels->total() }}</b></p>
                    {{ $hotels->links('pagination::bootstrap-4') }}
                </div>
            </div>




    </main>

    <script>
        function checkAvailability(id) {
            var checkbox = $('input[data-val="' + id + '"]');
            var newAvailability = checkbox.prop('checked') ? 1 : 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('hotel-list.item.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                        });
                        location.reload();
                    }, 1);
                },
                error: function(error) {
                    // Handle the error response
                    console.error(error);

                    // Show an error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }
    </script>

@endsection
