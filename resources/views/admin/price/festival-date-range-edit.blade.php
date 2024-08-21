@extends('admin.layouts.frontend')
@section('title', 'Default Price')
@section('meta_description', 'Pench Default Price Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">




        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $id == 'Create' ? 'Create' : 'Edit' }} Festival Price</h1>
        </div>

        <div
            class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-danger fw-bold">
            <h1 class="h2">Indian</h1>
        </div>

        <form method="POST"
            action="{{ route('default-price-edit-list-store', ['id' => $id, 'mode' => $mode, 'type' => $type, 'status' => $id == 'Create' ? 'Create' : 'Edit']) }}"
            class="indian-price">
            @csrf

            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="start" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start" name="start"
                        value="{{ $price->start ?? '' }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="end" class="form-label">End Start</label>
                    <input type="date" class="form-control" id="end" name="end" value="{{ $price->end ?? '' }}"
                        onchange="getTimingsData();">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mb-3">
                    <label for="timings" class="form-label fw-bold">Timing</label>
                    <select class="form-select" id="timings" name="timings">
                        <option value="">Select Timing</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult1" class="form-label fw-bold">Adult 1</label>
                    <input type="text" class="form-control" id="indian_adult1" name="indian_adult1"
                        value="{{ $price->indian_adult1 ?? '' }}">
                    @error('indian_adult1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult2" class="form-label fw-bold">Adult 2</label>
                    <input type="text" class="form-control" id="indian_adult2" name="indian_adult2"
                        value="{{ $price->indian_adult2 ?? '' }}">
                    @error('indian_adult2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult3" class="form-label fw-bold">Adult 3</label>
                    <input type="text" class="form-control" id="indian_adult3" name="indian_adult3"
                        value="{{ $price->indian_adult3 ?? '' }}">
                    @error('indian_adult3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult4" class="form-label fw-bold">Adult 4</label>
                    <input type="text" class="form-control" id="indian_adult4" name="indian_adult4"
                        value="{{ $price->indian_adult4 ?? '' }}">
                    @error('indian_adult4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult5" class="form-label fw-bold">Adult 5</label>
                    <input type="text" class="form-control" id="indian_adult5" name="indian_adult5"
                        value="{{ $price->indian_adult5 ?? '' }}">
                    @error('indian_adult5')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_adult6" class="form-label fw-bold">Adult 6</label>
                    <input type="text" class="form-control" id="indian_adult6" name="indian_adult6"
                        value="{{ $price->indian_adult6 ?? '' }}">
                    @error('indian_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2 mb-3">
                    <label for="indian_child1" class="form-label fw-bold">Child 1</label>
                    <input type="text" class="form-control" id="indian_child1" name="indian_child1"
                        value="{{ $price->indian_child1 ?? '' }}">
                    @error('indian_child1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_child2" class="form-label fw-bold">Child 2</label>
                    <input type="text" class="form-control" id="indian_child2" name="indian_child2"
                        value="{{ $price->indian_child2 ?? '' }}">
                    @error('indian_child2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_child3" class="form-label fw-bold">Child 3</label>
                    <input type="text" class="form-control" id="indian_child3" name="indian_child3"
                        value="{{ $price->indian_child3 ?? '' }}">
                    @error('indian_child3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_child4" class="form-label fw-bold">Child 4</label>
                    <input type="text" class="form-control" id="indian_child4" name="indian_child4"
                        value="{{ $price->indian_child4 ?? '' }}">
                    @error('indian_child4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_child5" class="form-label fw-bold">Child 5</label>
                    <input type="text" class="form-control" id="indian_child5" name="indian_child5"
                        value="{{ $price->indian_child5 ?? '' }}">
                    @error('indian_child5')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="indian_child6" class="form-label fw-bold">Child 6</label>
                    <input type="text" class="form-control" id="indian_child6" name="indian_child6"
                        value="{{ $price->indian_child6 ?? '' }}">
                    @error('indian_child6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div
                class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-4 border-bottom text-danger fw-bold">
                <h1 class="h2">Foreigner</h1>
            </div>

            <div class="row">
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult1" class="form-label fw-bold">Adult 1</label>
                    <input type="text" class="form-control" id="foreigner_adult1" name="foreigner_adult1"
                        value="{{ $price->foreigner_adult1 ?? '' }}">
                    @error('foreigner_adult1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult2" class="form-label fw-bold">Adult 2</label>
                    <input type="text" class="form-control" id="foreigner_adult2" name="foreigner_adult2"
                        value="{{ $price->foreigner_adult2 ?? '' }}">
                    @error('foreigner_adult2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult3" class="form-label fw-bold">Adult 3</label>
                    <input type="text" class="form-control" id="foreigner_adult3" name="foreigner_adult3"
                        value="{{ $price->foreigner_adult3 ?? '' }}">
                    @error('foreigner_adult3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult4" class="form-label fw-bold">Adult 4</label>
                    <input type="text" class="form-control" id="foreigner_adult4" name="foreigner_adult4"
                        value="{{ $price->foreigner_adult4 ?? '' }}">
                    @error('foreigner_adult4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult5" class="form-label fw-bold">Adult 5</label>
                    <input type="text" class="form-control" id="foreigner_adult5" name="foreigner_adult5"
                        value="{{ $price->foreigner_adult5 ?? '' }}">
                    @error('foreigner_adult5')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_adult6" class="form-label fw-bold">Adult 6</label>
                    <input type="text" class="form-control" id="foreigner_adult6" name="foreigner_adult6"
                        value="{{ $price->foreigner_adult6 ?? '' }}">
                    @error('foreigner_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child1" class="form-label fw-bold">Child 1</label>
                    <input type="text" class="form-control" id="foreigner_child1" name="foreigner_child1"
                        value="{{ $price->foreigner_child1 ?? '' }}">
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child2" class="form-label fw-bold">Child 2</label>
                    <input type="text" class="form-control" id="foreigner_child2" name="foreigner_child2"
                        value="{{ $price->foreigner_child2 ?? '' }}">
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child3" class="form-label fw-bold">Child 3</label>
                    <input type="text" class="form-control" id="foreigner_child3" name="foreigner_child3"
                        value="{{ $price->foreigner_child3 ?? '' }}">
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child4" class="form-label fw-bold">Child 4</label>
                    <input type="text" class="form-control" id="foreigner_child4" name="foreigner_child4"
                        value="{{ $price->foreigner_child4 ?? '' }}">
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child5" class="form-label fw-bold">Child 5</label>
                    <input type="text" class="form-control" id="foreigner_child5" name="foreigner_child5"
                        value="{{ $price->foreigner_child5 ?? '' }}">
                </div>
                <div class="col-sm-2 mb-3">
                    <label for="foreigner_child6" class="form-label fw-bold">Child 6</label>
                    <input type="text" class="form-control" id="foreigner_child6" name="foreigner_child6"
                        value="{{ $price->foreigner_child6 ?? '' }}">
                </div>
            </div>

            <div class="my-3">
                <button style="width: 16rem;" type="submit" class="btn btn-success">Save</button>
            </div>
        </form>

    </main>

    <script>
        function getTimingsData() {
            console.log($("#end").val() + "Console Log");
            var start = $("#start").val();
            var end = $("#end").val();
            var type = "{{ $type }}";
            var mode = "{{ $mode }}";

            if ($("#start").val() != "") {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('date.range.get.timings') }}',
                    data: JSON.stringify({
                        'start': start,
                        'end': end,
                        'type': type,
                        'mode': mode
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        // Show a success popup
                        if (response.status == "start_failed") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        } else if (response.status == "booking_type_failed") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        } else {
                            console.log(response.data);
                            const timings = response.data;
                            const selectElement = document.getElementById('timings');
                            selectElement.innerHTML = '<option value="">Select Timing</option>';
                            timings.forEach(timing => {
                                const option = document.createElement('option');
                                option.value = timing;
                                option.text = timing;
                                selectElement.appendChild(option);
                            });

                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to fetch timing. Please try again later.',
                        });
                    }
                });

            }
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('date.range.get.timings') }}',
                data: JSON.stringify({
                    'start': '{{ $id == 'Create' ? '' : $price->start }}',
                    'end': '{{ $id == 'Create' ? '' : $price->end }}',
                    'type': '{{ $id == 'Create' ? '' : $type }}',
                    'mode': '{{ $id == 'Create' ? '' : $mode }}'
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    console.log(response.data);
                    const timings = response.data;
                    const selectElement = document.getElementById('timings');
                    selectElement.innerHTML = '<option value="">Select Timing</option>';

                    timings.forEach(timing => {
                        const option = document.createElement('option');
                        option.value = timing;
                        option.text = timing;
                        selectElement.appendChild(option);
                    });


                    $("#timings").val('{{ $id == 'Create' ? '' : $price->time }}');
                },
                error: function(error) {
                    console.error(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to fetch timing. Please try again later.',
                    });
                }
            });
        });
    </script>

@endsection
