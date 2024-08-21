@extends('admin.layouts.frontend')
@section('title', 'Available Hotel Room')
@section('meta_description', 'Jim Corbett Wedding Hotel Room List Available Hotel Room')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $getHotelRoomName }} Date Price</h1>
        </div>

        <form method="post" action="{{ route('available-hotel-room-item') }}">
            @csrf
            <input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="{{ $hotel_id }}">
            <input type="hidden" class="form-control" id="room_id" name="room_id" value="{{ $room_id }}">

            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="room_check_in" class="form-label">Room Check In</label>
                    <input type="date" class="form-control" id="room_check_in" name="room_check_in" value=""
                        placeholder="Room Check In....">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="room_check_out" class="form-label">Room Check Out</label>
                    <input type="date" class="form-control" id="room_check_out" name="room_check_out" value=""
                        placeholder="Room Check Out....">
                </div>


                <div class="col-lg-4 mb-3">
                    <label for="availability" class="form-label">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="only_room" class="form-label">Only Room</label>
                    <input type="text" class="form-control" id="only_room" name="only_room" value=""
                        placeholder="₹ Only Room....">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="room_with_breakfast" class="form-label">Room With Breakfast</label>
                    <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                        value="" placeholder="₹ Room With Breakfast....">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="room_with_breakfast_dinner" class="form-label">Room With Breakfast Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_dinner"
                        name="room_with_breakfast_dinner" value="" placeholder="₹ Room With Breakfast Dinner....">
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="room_with_breakfast_lunch_dinner" class="form-label">Room With Breakfast Lunch
                        Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                        name="room_with_breakfast_lunch_dinner" value=""
                        placeholder="₹ Room With Breakfast Lunch Dinner....">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="note" class="form-label">Note</label>
                    <input type="text" class="form-control" id="note" name="note" value=""
                        placeholder="Note....">
                </div>
                <div class="col-lg-4 mb-3">
                    <button type="submit" class="btn btn-primary mt-4">Set Availability</button>
                </div>
            </div>
        </form>



        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table border-light tablesection">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Only Room</th>
                            <th scope="col">Room With Breakfast</th>
                            <th scope="col">Room With Breakfast Dinner</th>
                            <th scope="col">Room With Breakfast Lunch Dinner</th>
                            <th scope="col">Check In Date</th>
                            <th scope="col">Check Out Date</th>
                            <th scope="col">Note</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotelRoomAvailable as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->only_room }}</td>
                                <td>{{ $room->room_with_breakfast }}</td>
                                <td>{{ $room->room_with_breakfast_dinner }}</td>
                                <td>{{ $room->room_with_breakfast_lunch_dinner }}</td>
                                <td>{{ $room->room_check_in }}</td>
                                <td>{{ $room->room_check_out }}</td>
                                <td>{{ $room->note }}</td>
                                <td>
                                    <label class="switch availability-switch"
                                        onchange="checkAvailability({{ $room->id }});">
                                        <input type="checkbox" {{ $room->status == 1 ? 'checked' : '' }}
                                            data-val="{{ $room->id }}" id="Available">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- <a href="{{ route('hotel.room.edit', ['hotel_id'=> $id,'room_id' => $room->id]) }}" class="btn btn-warning" style="height: 9%; margin-top: 20%; margin-right: 10%;">
                                    <i class="bi bi-pencil-fill"></i>
                                </a> --}}
                                        <form
                                            action="{{ route('hotel.room.available.delete', ['room_available_id' => $room->id]) }}"
                                            method="POST" class="mt-4">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
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
                <p><b>Total records: {{ $hotelRoomAvailable->total() }}, Displaying records
                        {{ $hotelRoomAvailable->firstItem() }} to {{ $hotelRoomAvailable->lastItem() }} of
                        {{ $hotelRoomAvailable->total() }}</b></p>
                {{ $hotelRoomAvailable->links('pagination::bootstrap-4') }}
            </div>
        </div>



        <hr style="margin-bottom: 5%;">

        {{-- Block dates Start --}}

        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Block {{ $getHotelRoomName }} Date</h1>
        </div>

        <form method="post" action="{{ route('block-hotel-room-item') }}">
            @csrf
            <input type="hidden" class="form-control" id="block_hotel_id" name="block_hotel_id"
                value="{{ $hotel_id }}">
            <input type="hidden" class="form-control" id="block_room_id" name="block_room_id"
                value="{{ $room_id }}">

            <div class="row">
                <div class="col-lg-2">
                    <label for="block_room_check_in" class="form-label">Block Date</label>
                    <input type="date" class="form-control" id="block_room_check_in" name="block_room_check_in"
                        value="" placeholder="Block Date....">
                </div>
                {{-- <div class="col-sm-2">
                    <label for="block_room_check_in" class="form-label">Room Check In</label>
                    <input type="date" class="form-control" id="block_room_check_in" name="block_room_check_in" value="" placeholder="Room Check In....">
                </div>
                <div class="col-sm-2">
                    <label for="block_room_check_out" class="form-label">Room Check Out</label>
                    <input type="date" class="form-control" id="block_room_check_out" name="block_room_check_out" value="" placeholder="Room Check Out....">
                </div> --}}
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary mt-4">Block</button>
                </div>
            </div>
        </form>


        <div class="tabsection jungle">
            <div class="table-responsive">
                <table class="table border-light tablesection">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            {{-- <th scope="col">Check Out</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hotelRoomBlock as $block)
                            <tr>
                                <td>{{ $block->id }}</td>
                                <td>{{ $block->room_check_in }}</td>
                                {{-- <td>{{ $block->room_check_out }}</td> --}}
                                <td>
                                    <div class="btn-group" role="group">
                                        <form
                                            action="{{ route('hotel.room.block.delete', ['room_block_id' => $block->id]) }}"
                                            method="POST" class="mt-4">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
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
                <p><b>Total records: {{ $hotelRoomBlock->total() }}, Displaying records {{ $hotelRoomBlock->firstItem() }}
                        to {{ $hotelRoomBlock->lastItem() }} of {{ $hotelRoomBlock->total() }}</b></p>
                {{ $hotelRoomBlock->links('pagination::bootstrap-4') }}
            </div>
        </div>

        {{-- Block Date End --}}

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
                url: '{{ route('hotel-list.room.available') }}',
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
