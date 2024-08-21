@extends('admin.layouts.frontend')
@section('title', 'Edit Hotel Room')
@section('meta_description', 'Jim Corbett Wedding Hotel Room List Edit Hotel Room')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Hotel Room</h1>
        </div>

        <form method="post" action="{{ route('edit-hotel-room-item', ['hotel_id' => $hotel_id, 'room_id' => $room_id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="name" class="form-label fw-bold">Room Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $hotelRoomData[0]['room'] }}" placeholder="Room Name....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1" {{ $hotelRoomData[0]['status'] == 1 ? 'selected' : '' }}>Available
                        </option>
                        <option value="0" {{ $hotelRoomData[0]['status'] == 0 ? 'selected' : '' }}>Not Available
                        </option>
                    </select>
                </div>
            </div>

            @php

                $only_room = round(($hotelRoomData[0]['only_room'] * 2) / 100);
                $room_with_breakfast = round(($hotelRoomData[0]['room_with_breakfast'] * 2) / 100);
                $room_with_breakfast_dinner = round(($hotelRoomData[0]['room_with_breakfast_dinner'] * 2) / 100);
                $room_with_breakfast_lunch_dinner = round(
                    ($hotelRoomData[0]['room_with_breakfast_lunch_dinner'] * 2) / 100,
                );

                $only_room = $hotelRoomData[0]['only_room'] - $only_room;
                $room_with_breakfast = $hotelRoomData[0]['room_with_breakfast'] - $room_with_breakfast;
                $room_with_breakfast_dinner =
                    $hotelRoomData[0]['room_with_breakfast_dinner'] - $room_with_breakfast_dinner;
                $room_with_breakfast_lunch_dinner =
                    $hotelRoomData[0]['room_with_breakfast_lunch_dinner'] - $room_with_breakfast_lunch_dinner;
            @endphp

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="only_room" class="form-label fw-bold">Only Room</label>
                    <input type="text" class="form-control" id="only_room" name="only_room" value="{{ $only_room }}"
                        placeholder="Only Room....">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast" class="form-label fw-bold">Room With Breakfast</label>
                    <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                        value="{{ $room_with_breakfast }}" placeholder="Room With Breakfast....">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast_dinner" class="form-label fw-bold">Room With Breakfast Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_dinner"
                        name="room_with_breakfast_dinner" value="{{ $room_with_breakfast_dinner }}"
                        placeholder="Room With Breakfast Dinner....">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast_lunch_dinner" class="form-label fw-bold">Room With Breakfast Lunch
                        Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                        name="room_with_breakfast_lunch_dinner" value="{{ $room_with_breakfast_lunch_dinner }}"
                        placeholder="Room With Breakfast Lunch Dinner....">
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 mb-3">
                    <label for="image" class="form-label fw-bold">Upload Room Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="">
                    <img class="mt-2" src="{{ '/admin/uploads/rooms/' . $hotelRoomData[0]['image'] }}" width="250px"
                        height="200px">
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="room_facility" class="form-label fw-bold">Room facilities:</label>
                    <div id="facilityContainer">
                        @foreach ($hotelRoomFacility as $facility)
                            <div class="d-flex" id="facility-item{{ $facility['id'] }}">
                                <input type="text" class="form-control" name="room_facility[]"
                                    placeholder="Room facilities...." value="{{ $facility['facility'] }}">
                                <button class="btn btn-danger remove-facility"
                                    onclick="removeFacility({{ $facility['id'] }});">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success my-3" onclick="addFacility()">Add Facility</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="room_benefit" class="form-label fw-bold">Room Inclusions:</label>
                    <div id="benefitContainer">
                        @foreach ($hotelRoomBenefit as $benefit)
                            <div class="d-flex" id="benefit-item{{ $benefit['id'] }}">
                                <input type="text" class="form-control" name="room_benefit[]"
                                    placeholder="Room benefit...." value="{{ $benefit['benefit'] }}">
                                <button class="btn btn-danger remove-benefit"
                                    onclick="removeBenefit({{ $benefit['id'] }});">Remove</button>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success my-3" onclick="addBenefit()">Add Inclusion</button>
                </div>
            </div>

            <div class="row my-4">
                <div class="d-flex gap-3">
                    <button style="width:14rem;" type="submit" class="btn btn-success btn-block ">Save</button>

                    <a href="{{ route('hotel-list') }}" class="btn btn-outline-dark btn-block ">Back</a>
                </div>
            </div>

        </form>



    </main>

    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     addFacility();
        // });

        function addFacility() {
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.name = "room_facility[]";
            input.placeholder = "Room facilities....";

            var removeButton = document.createElement("button");
            removeButton.innerHTML = "Remove";
            removeButton.className = "btn btn-danger";
            removeButton.onclick = function() {
                removeFacility(input);
            };

            var container = document.createElement("div");
            container.className = "d-flex";
            container.appendChild(input);
            container.appendChild(removeButton);

            document.getElementById("facilityContainer").appendChild(container);
        }

        function removeFacility(facilityId) {
            console.log(facilityId);
            var element = document.getElementById('facility-item' + facilityId);
            if (element) {
                element.remove();
            }
        }

        function addBenefit() {
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.name = "room_benefit[]";
            input.placeholder = "Room benefit....";

            var removeButton = document.createElement("button");
            removeButton.innerHTML = "Remove";
            removeButton.className = "btn btn-danger";
            removeButton.onclick = function() {
                removeBenefit(input);
            };

            var container = document.createElement("div");
            container.className = "d-flex";
            container.appendChild(input);
            container.appendChild(removeButton);

            document.getElementById("benefitContainer").appendChild(container);
        }

        function removeBenefit(facilityId) {
            console.log(facilityId);
            var element = document.getElementById('benefit-item' + facilityId);
            if (element) {
                element.remove();
            }
        }
    </script>

@endsection
