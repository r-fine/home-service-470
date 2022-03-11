@extends('../layouts/base')

@section('content')
<div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center my-5 mx-5 px-5">
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" alt="Responsive image" src="{{URL::asset('/images/logo.png')}}"" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-dark text-decoration-none">
                    <!-- Product name-->
                    <h5 class="fw-bolder text-center">Test Service</h5>
                    <hr>
                    <!-- Product price-->
                    <div class="d-flex justify-content-center align-items-end">
                        <a href="#" class="text-decoration-none">
                            <small class="text-primary fw-bolder fs-6 text-align-center">View Details</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" alt="Responsive image" src="{{URL::asset('/images/logo.png')}}"" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-dark text-decoration-none">
                    <!-- Product name-->
                    <h5 class="fw-bolder text-center">Test Service</h5>
                    <hr>
                    <!-- Product price-->
                    <div class="d-flex justify-content-center align-items-end">
                        <a href="#" class="text-decoration-none">
                            <small class="text-primary fw-bolder fs-6 text-align-center">View Details</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" alt="Responsive image" src="{{URL::asset('/images/logo.png')}}"" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-dark text-decoration-none">
                    <!-- Product name-->
                    <h5 class="fw-bolder text-center">Test Service</h5>
                    <hr>
                    <!-- Product price-->
                    <div class="d-flex justify-content-center align-items-end">
                        <a href="#" class="text-decoration-none">
                            <small class="text-primary fw-bolder fs-6 text-align-center">View Details</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection