@extends('admin.layouts.frontend')
@section('title', 'Add Hotel Room')
@section('meta_description', 'Jim Corbett Wedding Hotel Room List Add Hotel Room')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Hotel Room</h1>
        </div>

        <form method="post" action="{{ route('add-hotel-room-item', ['hotel_id' => $hotel_id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="name" class="form-label fw-bold">Room Name</label>
                    <input type="text" class="form-control" id="name" name="name" value=""
                        placeholder="Room Name....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1">Availability</option>
                        <option value="0">Not Availability</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="only_room" class="form-label fw-bold">Only Room</label>
                    <input type="text" class="form-control" id="only_room" name="only_room" value=""
                        placeholder="Only Room....">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast" class="form-label fw-bold">Room With Breakfast</label>
                    <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                        value="" placeholder="Room With Breakfast....">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast_dinner" class="form-label fw-bold">Room With Breakfast Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_dinner"
                        name="room_with_breakfast_dinner" value="" placeholder="Room With Breakfast Dinner....">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="room_with_breakfast_lunch_dinner" class="form-label fw-bold">Room With Breakfast Lunch
                        Dinner</label>
                    <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                        name="room_with_breakfast_lunch_dinner" value=""
                        placeholder="Room With Breakfast Lunch Dinner....">
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 mb-3">
                    <label for="image" class="form-label fw-bold">Upload Room Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="">
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="room_facility" class="form-label fw-bold">Room facilities:</label>
                    <div id="facilityContainer"></div>
                    <button type="button" class="btn btn-success my-2" onclick="addFacility()">Add Facility</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="room_benefit" class="form-label fw-bold">Room Inclusions:</label>
                    <div id="benefitContainer"></div>
                    <button type="button" class="btn btn-success my-2" onclick="addBenefit()">Add Inclusion</button>
                </div>
            </div>

            <div class="row my-3">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-block ">Save</button>

                    <a href="{{ route('hotel-list') }}" class="btn btn-outline-dark btn-block ">Back</a>
                </div>
            </div>

        </form>



    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            addFacility();
            addBenefit();
        });

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

        function removeFacility(element) {
            element.parentNode.remove();
        }

        function addBenefit() {
            var input = document.createElement("input");
            input.type = "text";
            input.className = "form-control";
            input.name = "room_benefit[]";
            input.placeholder = "Room benefits....";

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

        function removeBenefit(element) {
            element.parentNode.remove();
        }
    </script>

@endsection
