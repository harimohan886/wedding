@extends('admin.layouts.frontend')
@section('title', 'Default Price')
@section('meta_description', 'Pench Default Price Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">




        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Default Price Edit</h1>
        </div>

        <div
            class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-danger fw-bold">
            <h1 class="h2">Indian</h1>
        </div>


        <form method="POST"
            action="{{ route('default-price-edit-list-store', ['id' => $id, 'mode' => $mode, 'type' => $type, 'status' => 'Edit']) }}"
            class="indian-price">
            @csrf
            <div class="row">
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
                <div class="col-sm-2  mb-3">
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

            <div class="my-4">
                <button style="width: 16rem;" type="submit" class="btn btn-success">Update</button>
            </div>
        </form>


    </main>

@endsection
