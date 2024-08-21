@extends('admin.layouts.frontend')
@section('title', 'Weekend Page')
@section('meta_description', 'Weekend Page')
<style>
    .add_hotel_div {
        border: 1px solid black;
    }
</style>
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Weekend Page</h1>
        </div>

        <form method="post" action="{{ route('page.mangement.term.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title" class="mb-2"><strong>Title</strong></label>
                <textarea type="text" class="form-control summernote" id="title" name="title" placeholder="Title"
                    value="">{{ old('title', $weekend_page->title) }}</textarea>
                @error('title')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="heading" class="mb-2"><strong>Heading</strong></label>
                <input type="text" class="form-control" id="heading" name="heading" placeholder="heading"
                    value="{{ old('heading', $weekend_page->heading) }}">
                @error('heading')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="sub_heading" class="mb-2"><strong>Sub Heading</strong></label>
                <input type="text" class="form-control" id="sub_heading" name="sub_heading" placeholder="sub_heading"
                    value="{{ old('sub_heading', $weekend_page->sub_heading) }}">
                @error('sub_heading')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>


            <div class="form-group mt-3">
                <label for="images"><strong>Banner Image</strong></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" multiple
                            onchange="preview_image(this);">
                    </div>
                </div>
                @error('image')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
                <div>
                    <img id="preview" src="{{ $weekend_page->path }}" style="margin:10px;max-height:150px;">
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="banner_image_alt"><strong>Banner Image Alt</strong></label>
                <input type="banner_image_alt" class="form-control" id="banner_image_alt" name="banner_image_alt"
                    placeholder="Banner Image Alt" value="{{ old('banner_image_alt', $weekend_page->banner_image_alt) }}">
                @error('banner_image_alt')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="offer_status" class="form-label fw-bold">Offer Status</label>
                <select class="form-select" id="offer_status" name="offer_status">
                    <option value="">Select offer Status</option>
                    <option value="1" {{ $weekend_page->status == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $weekend_page->status == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="meta_title" class="mb-2"><strong>Meta Title</strong></label>
                <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta_title" value="">{{ old('meta_title', $weekend_page->meta_title) }}</textarea>
                @error('meta_title')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="meta_description" class="mb-2"><strong>Meta Description</strong></label>
                <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                    placeholder="meta_description" value="">{{ old('meta_description', $weekend_page->meta_description) }}</textarea>
                @error('meta_description')
                    <code>
                        {{ $message }}
                    </code>
                @enderror
            </div>

            <div id="sheriList">
                @if (!empty($weekend_attr))
                    @foreach ($weekend_attr as $ind => $fest)
                        @if ($ind == 0)
                            <div class="" style="float: right;padding: 19px;">
                                <input type="button" onClick="addMoreHotelDiv({{ $ind }})"
                                    class="btn btn-primary" value="Add More Hotel">
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>


            <div class="row my-4">
                <div class="">
                    <button style="width:15rem;" type="submit"
                        class="btn btn-success btn-lg btn-block float-end">Submit</button>
                </div>
            </div>


        </form>

    </main>

    <script>
        function preview_image(input, id) {
            id = id || '#preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                    // .width(150)
                    // .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function hotel_preview_images(input) {
            var container = $('#hotel_preview_container');
            container.empty();

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $('<img>').attr('src', e.target.result).addClass('m-2').css('max-height', '80px');
                        container.append(img);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Set the desired height of the editor
                // Add any other Summernote options you want to customize
            });
        });
    </script>

@endsection
