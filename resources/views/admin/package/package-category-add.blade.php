@extends('admin.layouts.frontend')
@section('title', 'Package Category Add')
@section('meta_description', 'Jim Corbett Wedding Package Category Add Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">




        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Package Category</h1>
        </div>


        <form method="POST" action="{{ route('package.category.store', ['package_id' => $package_id]) }}"
            class="indian-price">
            @csrf

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="category" class="form-label">Category name</label>
                    <input type="text" class="form-control" id="category" name="category" value=""
                        placeholder="Category name....">
                </div>
            </div>

            <div class="row">
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($UpdateFeature as $update)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hotels{{ $update['id'] }}"
                                value="{{ $update['id'] }}" name="hotels[]">
                            <label class="form-check-label" for="hotels{{ $update['id'] }}"
                                style="margin-right:10px;">{{ strtoupper($update['name']) }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div
                class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-danger fw-bold">
                <h1 class="h2">Category Options (For Indians)</h1>
            </div>
            <div class="mb-3">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="filling"
                    style="transform: scale(2); margin-right: 10px;" onchange="autoFillPrice();">
                <label for="vehicle1" style="font-size: 20px;">Autofill Indian Price To Foreigner Price</label>
            </div>

            <div class="row">
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult1" class="form-label fw-bold">Room Price</label>
                    <input type="text" class="form-control calculateRoomPrice" id="indian_adult1"
                        name="indian[0][price]">
                    @error('indian_adult1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult2" class="form-label fw-bold">Extra bed AD</label>
                    <input type="text" class="form-control indian_extra_beds" id="indian_adult2"
                        name="indian[0][extra_beds]">
                    @error('indian_adult2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult3" class="form-label fw-bold">Extra bed CH</label>
                    <input type="text" class="form-control indian_extra_bed_ch" id="indian_adult3"
                        name="indian[0][extra_bed_ch]">
                    @error('indian_adult3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult4" class="form-label fw-bold">F. R Price</label>
                    <input type="text" class="form-control indian_fe_extra_bed_ch" id="indian_adult4"
                        name="indian[0][fes_room_price]">
                    @error('indian_adult4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult5" class="form-label fw-bold">F. A Price</label>
                    <input type="text" class="form-control indian_fe_extra_beds" id="indian_adult5"
                        name="indian[0][fes_ad_price]">
                    @error('indian_adult5')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult6" class="form-label fw-bold">F. C Price</label>
                    <input type="text" class="form-control indian_extra_fe_bed_ch" id="indian_adult6"
                        name="indian[0][fes_ch_price]">
                    @error('indian_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult6" class="form-label fw-bold">S De Price</label>
                    <input type="text" class="form-control indian_sde_price" id="indian_adult6"
                        name="indian[0][s_de_price]">
                    @error('indian_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult6" class="form-label fw-bold">S We Price</label>
                    <input type="text" class="form-control indian_swe_price" id="indian_adult6"
                        name="indian[0][s_we_price]">
                    @error('indian_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="indian_adult6" class="form-label fw-bold">S Fe Price</label>
                    <input type="text" class="form-control indian_sfe_price" id="indian_adult6"
                        name="indian[0][s_fe_price]">
                    @error('indian_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div
                class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-danger fw-bold">

                <div
                    class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-danger fw-bold">
                    <h1 class="h2">Category Options (For Foreigners)</h1>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult1" class="form-label fw-bold">Room Price</label>
                    <input type="text" class="form-control for_calculateRoomPrice" id="foreigner_adult1"
                        name="foreigner[0][price]">
                    @error('foreigner_adult1')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult2" class="form-label fw-bold">Extra bed AD</label>
                    <input type="text" class="form-control for_extra_beds" id="foreigner_adult2"
                        name="foreigner[0][extra_beds]">
                    @error('foreigner_adult2')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult3" class="form-label fw-bold">Extra bed CH</label>
                    <input type="text" class="form-control for_extra_bed_ch" id="foreigner_adult3"
                        name="foreigner[0][extra_bed_ch]">
                    @error('foreigner_adult3')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult4" class="form-label fw-bold">F. R Price</label>
                    <input type="text" class="form-control for_fe_calculateRoomPrice" id="foreigner_adult4"
                        name="foreigner[0][fes_room_price]">
                    @error('foreigner_adult4')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult5" class="form-label fw-bold">F. A Price</label>
                    <input type="text" class="form-control for_fe_extra_beds" id="foreigner_adult5"
                        name="foreigner[0][fes_ad_price]">
                    @error('foreigner_adult5')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult6" class="form-label fw-bold">F. C Price</label>
                    <input type="text" class="form-control for_fe_extra_bed_ch" id="foreigner_adult6"
                        name="foreigner[0][fes_ch_price]">
                    @error('foreigner_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult6" class="form-label fw-bold">S De Price</label>
                    <input type="text" class="form-control for_sde_price" id="foreigner_adult6"
                        name="foreigner[0][s_de_price]">
                    @error('foreigner_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult6" class="form-label fw-bold">S We Price</label>
                    <input type="text" class="form-control for_swe_price" id="foreigner_adult6"
                        name="foreigner[0][s_we_price]">
                    @error('foreigner_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="foreigner_adult6" class="form-label fw-bold">S Fe Price</label>
                    <input type="text" class="form-control for_sfe_price" id="foreigner_adult6"
                        name="foreigner[0][s_fe_price]">
                    @error('foreigner_adult6')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="my-4">
                <button style="width: 14rem;" type="submit" class="btn btn-success">Update</button>
            </div>
        </form>

    </main>
    <script>
        $(".calculateRoomPrice").focusout(function() {
            let roomPrice = $(this).val();
            let extrabedPrice = roomPrice * 35 / 100;
            let extra_bed_ch = roomPrice * 25 / 100;
            $(".indian_extra_beds").val(extrabedPrice)
            $(".indian_extra_bed_ch").val(extra_bed_ch)
        });
        $(".indian_fe_extra_bed_ch").focusout(function() {
            let roomPrice = $(this).val();
            let extrabedPrice = roomPrice * 35 / 100;
            let extra_bed_ch = roomPrice * 25 / 100;
            $(".indian_fe_extra_beds").val(extrabedPrice)
            $(".indian_extra_fe_bed_ch").val(extra_bed_ch)
        });
        $(".for_calculateRoomPrice").focusout(function() {
            let roomPrice = $(this).val();
            let extrabedPrice = roomPrice * 35 / 100;
            let extra_bed_ch = roomPrice * 25 / 100;
            $(".for_extra_beds").val(extrabedPrice)
            $(".for_extra_bed_ch").val(extra_bed_ch)
        });
        $(".for_fe_calculateRoomPrice").focusout(function() {
            let roomPrice = $(this).val();
            let extrabedPrice = roomPrice * 35 / 100;
            let extra_bed_ch = roomPrice * 25 / 100;
            $(".for_fe_extra_beds").val(extrabedPrice)
            $(".for_fe_extra_bed_ch").val(extra_bed_ch)
        });

        function autoFillPrice() {
            const checkbox = document.getElementById('vehicle1');
            if (checkbox.checked) {
                let input1 = $(".calculateRoomPrice").val();
                let input2 = $(".indian_extra_beds").val();
                let input3 = $(".indian_extra_bed_ch").val();
                let input4 = $(".indian_fe_extra_bed_ch").val();
                let input5 = $(".indian_fe_extra_beds").val();
                let input6 = $(".indian_extra_fe_bed_ch").val();
                let input7 = $(".indian_sde_price").val();
                let input8 = $(".indian_swe_price").val();
                let input9 = $(".indian_sfe_price").val();

                $(".for_calculateRoomPrice").val(input1);
                $(".for_extra_beds").val(input2);
                $(".for_extra_bed_ch").val(input3);
                $(".for_fe_calculateRoomPrice").val(input4);
                $(".for_fe_extra_beds").val(input5);
                $(".for_fe_extra_bed_ch").val(input6);
                $(".for_sde_price").val(input7);
                $(".for_swe_price").val(input8);
                $(".for_sfe_price").val(input9);
            } else {
                $(".for_calculateRoomPrice").val('');
                $(".for_extra_beds").val('');
                $(".for_extra_bed_ch").val('');
                $(".for_fe_calculateRoomPrice").val('');
                $(".for_fe_extra_beds").val('');
                $(".for_fe_extra_bed_ch").val('');
                $(".for_sde_price").val('');
                $(".for_swe_price").val('');
                $(".for_sfe_price").val('');
            }
        }
    </script>
@endsection
