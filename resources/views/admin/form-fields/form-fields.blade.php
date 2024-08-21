@extends('admin.layouts.frontend')
@section('title', 'Wedding Form Fields')
@section('meta_description', 'Jim Corbett Wedding Booking Wedding Form Fields')
@section('content')
    <style>
        .card-set {
            max-height: 15rem;
            overflow: auto;
        }
    </style>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2 ">
                    <h3>Venue</h3>
                    <a href="{{ route('venue-create') }}" class=" btn btn-success float-end">Add Venue</a>
                </div>
            </div>
            <div class="card-body card-set">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vanues??[] as $key=>$vanue)
                                <tr>
                                    <td class="text-center">{{ ++$key }}.</td>
                                    <td class="text-center">{{ $vanue->name }}</td>
                                    <td class="text-center">
                                        <label class="switch availability-switch">
                                            <input type="checkbox" id="venue-{{ $vanue->id }}"
                                                {{ $vanue->status == 1 ? 'checked' : '' }}
                                                onchange="checkStatus({{ $vanue->id }}, '{{ route('update-venue-status') }}', 'data-vanue-val');"
                                                data-vanue-val="{{ $vanue->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('venue-edit', ['id' => $vanue->id]) }}"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirmDelete({{ $vanue->id }}, '{{ route('venue-delete', ':id') }}');"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Records Not Available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Budget</h3>
            <div class="card-body">
                @if (isset($maximum_budget) && isset($maximum_budget->id))
                    <form action="{{ route('update-enuiry-form-fields-data', ['id' => $maximum_budget->id ?? null]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="field" value="maximum_budget">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="maximum_budget" class="form-label">Maximum Budget</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="value" id="maximum_budget"
                                    value="{{ $maximum_budget['value'] ?? '' }}" aria-describedby="helpId"
                                    placeholder="Input Maximum Budget" />
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="text-center">Data not available for Budget.</p>
                @endif
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Guests</h3>
            <div class="card-body">
                @if (isset($maximum_guest) && isset($maximum_guest->id))
                    <form action="{{ route('update-enuiry-form-fields-data', ['id' => $maximum_guest->id ?? null]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="field" value="maximum_guest">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="maximum_guest" class="form-label">Maximum Guests</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="value" id="maximum_guest"
                                    value="{{ $maximum_guest['value'] ?? '' }}" aria-describedby="helpId"
                                    placeholder="Input Maximum Guests" />
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="text-center">Data not available for Guests.</p>
                @endif
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Rooms</h3>
            <div class="card-body">
                @if (isset($maximum_rooms) && isset($maximum_rooms->id))
                    <form action="{{ route('update-enuiry-form-fields-data', ['id' => $maximum_rooms['id'] ?? null]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="field" value="maximum_rooms">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="maximum_rooms" class="form-label">Maximum Rooms</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="value" id="maximum_rooms"
                                    value="{{ $maximum_rooms['value'] ?? '' }}" aria-describedby="helpId"
                                    placeholder="Input Maximum Rooms" />
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="text-center">Data not available for Rooms.</p>
                @endif
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Ratings</h3>
            <div class="card-body">
                @if (isset($maximum_ratings) && isset($maximum_ratings->id))
                    <form action="{{ route('update-enuiry-form-fields-data', ['id' => $maximum_ratings['id'] ?? null]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="field" value="maximum_ratings">
                        <div class="row">
                            <div class="col-lg-2">
                                <label for="maximum_ratings" class="form-label">Maximum Ratings</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="value" id="maximum_ratings"
                                    value="{{ $maximum_ratings['value'] ?? '' }}" aria-describedby="helpId"
                                    placeholder="Input Maximum Ratings" />
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                @else
                    <p class="text-center">Data not available for Ratings.</p>
                @endif
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2 ">
                    <h3>Wedding Functions</h3>
                    <a href="{{ route('wedding-function-create') }}" class=" btn btn-success float-end">Add Wedding
                        Functions</a>
                </div>
            </div>
            <div class="card-body card-set">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($weddingFunctions??[] as $key=>$wFunction)
                                <tr>
                                    <td class="text-center">{{ ++$key }}.</td>
                                    <td class="text-center">{{ $wFunction->name }}</td>
                                    <td class="text-center">
                                        <label class="switch availability-switch">
                                            <input type="checkbox" id="function-{{ $wFunction->id }}"
                                                {{ $wFunction->status == 1 ? 'checked' : '' }}
                                                onchange="checkStatus({{ $wFunction->id }}, '{{ route('update-wedding-functions-status') }}', 'data-function-val');"
                                                data-function-val="{{ $wFunction->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('wedding-function-edit', ['id' => $wFunction->id]) }}"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirmDelete({{ $wFunction->id }}, '{{ route('wedding-functions-delete', ':id') }}');"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Records Not Available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2 ">
                    <h3>Wedding Services</h3>
                    <a href="{{ route('wedding-service-create') }}" class=" btn btn-success float-end">Add Wedding
                        Services</a>
                </div>
            </div>
            <div class="card-body card-set">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($weddingServices??[] as $key=>$wService)
                                <tr>
                                    <td class="text-center">{{ ++$key }}.</td>
                                    <td class="text-center">{{ $wService->name }}</td>
                                    <td class="text-center">
                                        <label class="switch availability-switch">
                                            <input type="checkbox" id="service-{{ $wService->id }}"
                                                {{ $wService->status == 1 ? 'checked' : '' }}
                                                onchange="checkStatus({{ $wService->id }}, '{{ route('update-wedding-service-status') }}', 'data-service-val');"
                                                data-service-val="{{ $wService->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ route('wedding-service-edit', ['id' => $wService->id]) }}"
                                                class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <a href="#"
                                                onclick="confirmDelete({{ $wService->id }}, '{{ route('wedding-service-delete', ':id') }}');"
                                                class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Records Not Available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            function checkStatus(id, url, dataAttr) {
                var checkbox = $('input[' + dataAttr + '="' + id + '"]');
                var status = checkbox.prop('checked') ? 1 : 0;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: JSON.stringify({
                        'id': id,
                        'status': status
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            setTimeout(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: response.msg,
                                });
                                location.reload();
                            }, 1);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.msg,
                            });
                        }
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to update availability. Please try again later.',
                        });
                    }
                });
            }

            function confirmDelete(id, url) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url.replace(':id', id);
                    }
                });
            }
        </script>
    @endpush
@endsection
