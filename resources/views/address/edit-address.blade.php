@extends('../layouts/dashboard')
@section('content')
<section class="my-2 pt-3">
    <div class="mx-auto mb-5" style="max-width: 550px;">
        <hr>
        <h1 class="text-center text-primary mb-3">Update Address</h1>
        <hr>
        {{-- <x-show-error /> --}}
        <form method="POST" action="{{ route('address.update', $address->id) }}">
            @csrf
            @method('PUT')
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="form-group my-2">
                <label for="full_name">Full name<span class=text-danger>*</span></label>
                <input type="text" name="full_name" id=""
                    class="form-control @error('full_name') border border-danger @enderror"
                    placeholder="Enter your full name" value="{{ $address->full_name }}" />
                @error('full_name')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="phone">Phone number<span class=text-danger>*</span></label>
                <input type="text" name="phone" id=""
                    class="form-control @error('phone') border border-danger @enderror" placeholder="e.g. 01xxxxxxxxx"
                    value="{{ $address->phone }}" />
                @error('phone')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="town_city">Town/City<span class=text-danger>*</span></label>
                <input type="text" name="town_city" id=""
                    class="form-control @error('town_city') border border-danger @enderror"
                    placeholder="Enter town/city" value="{{ $address->town_city }}" />
                @error('town_city')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="postal_code">Postal Code<span class=text-danger>*</span></label>
                <input type="number" name="postal_code" id=""
                    class="form-control @error('postal_code') border border-danger @enderror"
                    placeholder="Enter postal code" value="{{ $address->postal_code }}" />
                @error('postal_code')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="address_line">Address line 1<span class=text-danger>*</span></label>
                <input type="text" name="address_line" id=""
                    class="form-control @error('address_line') border border-danger @enderror"
                    placeholder="Enter address" value="{{ $address->address_line }}" />
                @error('address_line')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group my-2">
                <label for="address_line_2">Address line 2</label>
                <input type="text" name="address_line_2" id=""
                    class="form-control @error('address_line_2') border border-danger @enderror"
                    placeholder="(optional)" value="{{ $address->address_line_2 }}" />
                @error('address_line_2')
                <div class="fs-6 text-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row justify-content-xs-center mt-3 mx-auto">
                <button type="submit" class="btn btn-secondary">Update</button>
            </div>
        </form>
    </div>
</section>

@endsection
