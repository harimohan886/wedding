@extends('admin.layouts.frontend')
@section('title', 'Wedding Programs Gallery')
@section('meta_description', 'Jim Corbett Wedding Programs Gallery')
@section('content')
    <style>
        .form-set {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: white;
        }

        .image-container-set {
            max-height: 15rem;
            overflow-y: auto;
        }

        .bg-magenta {
            background-color: magenta;
            color: white;
        }
    </style>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2">
                    <h3>Images - <span class="text-danger"> {{ $weddingProgram['name'] }}</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('upload-wedding-program-image') }}" method="POST" enctype="multipart/form-data"
                    class="form-set">
                    @csrf
                    <input type="hidden" name="wedding_programs_id" value="{{ $weddingProgram['id'] }}">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Multiple Images</label>
                        <input type="file" class="form-control" id="image" name="image[]" placeholder="Choose Image"
                            multiple required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

                <div class="mt-3 image-container-set">
                    @foreach ($weddingProgramImages ?? [] as $weddingProgramImage)
                        <div id="image-container-{{ $weddingProgramImage->id }}"
                            class="d-inline-block position-relative me-2">
                            <img class="crossimages border border-secondary border-4 rounded-3 m-2"
                                src="{{ asset($weddingProgramImage->image_url) }}" width="140px" height="100px">
                            <span class="crossicon hotelImageDelete position-absolute top-0 end-0 p-2" title="Delete Image"
                                onclick="deleteImage({{ $weddingProgramImage->id }});">
                                <i class="bi bi-x-circle-fill fs-4 text-danger" style="top: 0px;left: -8px;"></i>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2">
                    <h3>Videos - <span class="text-danger"> {{ $weddingProgram['name'] }}</span></h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('upload-wedding-program-video') }}" method="POST" enctype="multipart/form-data"
                    class="form-set">
                    @csrf
                    <input type="hidden" name="wedding_programs_id" value="{{ $weddingProgram['id'] }}">
                    <div class="mb-3">
                        <label for="video" class="form-label">Upload Multiple Videos</label>
                        <input type="file" class="form-control" id="video" name="video[]" placeholder="Choose Video"
                            multiple required>
                        @error('video')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

                <div class="mt-3 image-container-set">
                    @foreach ($weddingProgramVideos ?? [] as $weddingProgramVideo)
                        <div id="video-container-{{ $weddingProgramVideo->id }}"
                            class="d-inline-block position-relative me-2">
                            <video class="border border-secondary border-4 rounded-3 m-2" controls
                                src="{{ asset($weddingProgramVideo['video_url']) }}" width="180px" height="140px">
                                Your browser does not support the video tag.
                            </video>
                            <span class="crossicon hotelImageDelete position-absolute top-0 end-0 p-2" title="Delete Video"
                                onclick="deleteVideo({{ $weddingProgramVideo->id }});">
                                <i class="bi bi-x-circle-fill fs-4 text-danger" style="top: 0px;left: -10px;"></i>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header m-0 py-0">
                <div class="d-flex justify-content-between p-2">
                    <h3>Reviews - <span class="text-danger"> {{ $weddingProgram['name'] }}</span></h3>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalId">
                        Add Review
                    </button>
                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-magenta">
                                    <h5 class="modal-title" id="modalTitleId">
                                        Add Review
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('store-wedding-program-review') }}" method="POST"
                                    enctype="multipart/form-data" class="form-set">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="wedding_programs_id"
                                            value="{{ $weddingProgram['id'] }}">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Please input name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="profile" class="form-label">Upload Profile Image</label>
                                            <input type="file" class="form-control" id="profile" name="profile"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Please input city name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Rating</label>
                                            <select class="form-select" name="rating" id="rating"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Rating</option>
                                                @foreach (['1', '2', '3', '4', '5'] as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="status"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Status</option>
                                                @foreach (['1' => 'Available', '0' => 'Not Available'] as $key => $item)
                                                    <option value="{{ $key }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Profile</th>
                                <th scope="col" class="text-center">City</th>
                                <th scope="col" class="text-center">Rating</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($weddingProgramReviews??[] as $key=>$weddingProgramReview)
                                <tr>
                                    <td class="text-center">{{ ++$key }}.</td>
                                    <td class="text-center">{{ $weddingProgramReview->name }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset($weddingProgramReview->image_url) }}" class="rounded-circle"
                                            height="50px;" width="50px;" alt="...">
                                    </td>
                                    <td class="text-center">{{ $weddingProgramReview->city }}</td>
                                    <td class="text-center">{{ $weddingProgramReview->rating }}</td>
                                    <td class="text-center">
                                        <label class="switch availability-switch">
                                            <input type="checkbox" id="venue-{{ $weddingProgramReview->id }}"
                                                {{ $weddingProgramReview->status == 1 ? 'checked' : '' }}
                                                onchange="checkStatus({{ $weddingProgramReview->id }}, '{{ route('update-status-wedding-program-review', ['wedding_program_id' => $weddingProgramReview->wedding_programs_id, 'wedding_program_review_id' => $weddingProgramReview->id]) }}', 'data-weddingProgramReview-val');"
                                                data-weddingProgramReview-val="{{ $weddingProgramReview->id }}">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="#" class="btn btn-warning"
                                                onclick="openEditReviewModal({{ $weddingProgramReview }})">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <div class="modal fade" id="editReviewModal" tabindex="-1"
                                                aria-labelledby="editReviewModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editReviewModalLabel">Edit Review
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form id="editReviewForm" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="modal-body">
                                                                <input type="hidden" name="review_id" id="review_id">
                                                                <div class="mb-3">
                                                                    <label for="edit_name"
                                                                        class="form-label float-start">Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit_name" name="name" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="edit_description"
                                                                        class="form-label float-start">Description</label>
                                                                    <textarea class="form-control" name="description" id="edit_description" rows="3"></textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="edit_city"
                                                                        class="form-label float-start">City</label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit_city" name="city" required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="edit_rating"
                                                                        class="form-label float-start">Rating</label>
                                                                    <select class="form-select" name="rating"
                                                                        id="edit_rating" required>
                                                                        @foreach (['1', '2', '3', '4', '5'] as $rating)
                                                                            <option value="{{ $rating }}">
                                                                                {{ $rating }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="edit_status"
                                                                        class="form-label float-start">Status</label>
                                                                    <select class="form-select" name="status"
                                                                        id="edit_status" required>
                                                                        <option value="1">Available</option>
                                                                        <option value="0">Not Available</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="edit_profile"
                                                                        class="form-label float-start">Upload
                                                                        Profile Image</label>
                                                                    <input type="file" class="form-control"
                                                                        id="edit_profile" name="profile">
                                                                    <img id="current_profile_img" src=""
                                                                        class="float-start" alt="Profile Image"
                                                                        width="100" height="100">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Update
                                                                    Review</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="#"
                                                onclick="confirmDelete({{ $weddingProgramReview->id }}, '{{ route('delete-wedding-program-review', ['wedding_program_id' => $weddingProgramReview->wedding_programs_id, 'wedding_program_review_id' => $weddingProgramReview->id]) }}');"
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
            function deleteImage(weddingProgramImageId) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('delete-wedding-program-image') }}',
                    type: 'POST',
                    data: {
                        weddingProgramImageId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#image-container-' + weddingProgramImageId).remove();
                            toastr.success(response.message);
                        } else {
                            console.error(response.message);
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function deleteVideo(weddingProgramVideoId) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route('delete-wedding-program-video') }}',
                    type: 'POST',
                    data: {
                        weddingProgramVideoId
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#video-container-' + weddingProgramVideoId).remove();
                            toastr.success(response.message);
                        } else {
                            console.error(response.message);
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function openEditReviewModal(review) {
                $('#editReviewModal #review_id').val(review.id);
                $('#editReviewModal #edit_name').val(review.name);
                $('#editReviewModal #edit_description').val(review.description);
                $('#editReviewModal #edit_city').val(review.city);
                $('#editReviewModal #edit_rating').val(review.rating);
                $('#editReviewModal #edit_status').val(review.status);
                $('#editReviewModal #current_profile_img').attr('src', '/' + review.image_url);
                $('#editReviewForm').attr('action', '/wedding-programs-review/update-review/' + review.wedding_programs_id +
                    '/' + review.id);
                $('#editReviewModal').modal('show');
            }

            $('#editReviewForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#editReviewModal').modal('hide');
                        location.reload();
                        toastr.success("{{ Session::get('success') }}");
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

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
                    url: url.replace(':id', id),
                    data: JSON.stringify({
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
