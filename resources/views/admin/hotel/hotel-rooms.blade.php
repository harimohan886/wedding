@extends('admin.layouts.frontend')
@section('title', 'Hotel Rooms')
@section('meta_description', 'Jim Corbett Wedding Hotel Rooms')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Hotel Rooms</h1>
            <div class="row" style="float: right;">
                <div class="col-sm-12">
                    <a href="{{ route('hotel.add.room.index', ['hotel_id' => $id]) }}" class=" btn btn-success">Add Room</a>
                </div>
            </div>
        </div>

        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table border-light tablesection">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amenity</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotelRoom as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->room }}</td>
                                <td>
                                    <label class="switch availability-switch"
                                        onchange="checkAvailability({{ $room->id }});">
                                        <input type="checkbox" {{ $room->status == 1 ? 'checked' : '' }}
                                            data-val="{{ $room->id }}" id="Available">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>


                                    <div class="btn-group d-flex gap-2 align-items-center justify-content-center"
                                        role="group">
                                        <a href="{{ route('hotel.room.available', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
                                            class="viewbutton">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('hotel.room.edit', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
                                            class="editbutton">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form
                                            action="{{ route('hotel.room.delete', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
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
                <p><b>Total records: {{ $hotelRoom->total() }}, Displaying records {{ $hotelRoom->firstItem() }} to
                        {{ $hotelRoom->lastItem() }} of {{ $hotelRoom->total() }}</b></p>
                {{ $hotelRoom->links('pagination::bootstrap-4') }}
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
                url: '{{ route('hotel-list.item.room.updateAvailability') }}',
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
