@extends('../layouts/base')
@section('title', $title)

@section('content')
<div class="container">
    <div class="row g-3 m-3 p-3 m-sm-3 p-sm-3 m-md-5 p-md-5 m-lg-5 p-lg-5">
        <div class="col-md-5 ps-3 col-lg-5 order-md-last p-0 order-1">
            <div class="d-grid gap-2">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <a href="{{ route('order.add.to.order', $service) }}" class="btn btn-primary fs-6 mx-md-4 mt-1 mb-3">
                    <i class="bi bi-plus-square-fill"></i> Book this service
                </a>
                <button type="button" class="btn btn-outline-success mx-md-4">
                    <i class="bi bi-star-fill"></i> Add to Favorites
                </button>
                <hr>

                <div class="accordion mt-4" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Description
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $service->description }}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Pricing
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{ $service->pricing }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-7 p-0">
            <div class="card mb-3 border-0">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body p-1">
                            <h1 class="mb-0 h2 px-4 pt-2 pb-4">{{ $service->title }}</h1>
                            <div class="bg-light"><img class="img-fluid mx-auto d-block" width="400px" height="400px"
                                    alt="Responsive image" src="{{ asset('images/service/' . $service->image) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
