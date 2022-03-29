@extends('../layouts/admin_dashboard')
@section('title', 'Order list')

@section('admin_content')
<section class="py-5">
    <div class="container mt-5">
        <div class="fw-bolder fs-3 text-danger text-center">Order List</div>
        <input class="form-control mb-5" id="myInput" type="text" placeholder="Search...">
        <table id="myInput" class="table table-hover" style="border-collapse:collapse;">
            <thead>
                <tr class="text-center">
                    <th scope="col">Order number</th>
                    <th scope="col">Full name</th>
                    <th scope="col">Phone no.</th>
                    <th scope="col">Address</th>
                    <th scope="col">Town/city</th>
                    <th scope="col">Delivery date</th>
                    <th scope="col">Delivery time</th>
                    <th scope="col">Placed on</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @foreach ($orders as $order)
            <tbody>
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->getFullName() }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->getFullAddress() }}</td>
                    <td>{{ $order->town_city }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->date)->format('d/m/Y') }}</td>
                    <td class="text-center">{{ $order->time }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" type="button" class="btn btn-sm btn-outline-dark accordion-toggle"
                                data-bs-toggle="collapse" data-bs-target="#accordion{{$order->id}}">Details</a>
                            <a href="#" type="button"
                                class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this order?')">
                                Delete
                            </a>
                            <a href="#" type="button"
                                class="btn btn-sm btn-outline-secondary">Edit</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="p-0">
                        <div id="accordion{{$order->id}}" class="accordian-body collapse my-2">
                            <div class="d-flex mb-2 text-secondary fw-bold justify-content-around">
                                <div>Service</div>
                                <div>delete/edit</div>
                                <div>Change status</div>
                            </div>
                            @foreach ($order->order_items as $item)
                            <div class="d-flex align-items-center">
                                <div><img class="me-3" src="{{ asset('images/service/' . $item->service->image) }}" alt="s img" width="50px"
                                        height="50px">
                                </div>
                                <div class="">{{ $item->service->title }}</div>
                                <div
                                    class="badge rounded-pill my-auto bg-@if ($item->status == 'Pending')secondary
                                    @elseif ($item->status == 'Accepted')primary
                                    @elseif ($item->status == 'Preparing')info
                                    @elseif ($item->status == 'Completed')success
                                    @elseif ($item->status == 'Cancelled')danger
                                    @endif">
                                    {{ $item->status }}
                                </div>
                                @if ($item->status == 'Pending' || $item->status == 'Accepted' || $item->status == 'Preparing')
                                <div class="ms-5 ps-5">
                                    <a href="#" type="button"
                                        class="text-danger"
                                        onclick="return confirm('Are you sure you want to cancel this order?')">
                                        <i class="bi bi-x-circle"></i></a>
                                </div>
                                @else
                                <div class="ms-3"></div>
                                @endif
                                <div class="me-5">
                                    <a href="#" class="btn btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                                <div class="btn-group ms-5">
                                    <a href="#" type="button"
                                        class="btn btn-sm btn-outline-primary">Accepted</a>
                                    <a href="#" type="button"
                                        class="btn btn-sm btn-outline-info">Preparing</a>
                                    <a href="#" type="button"
                                        class="btn btn-sm btn-outline-success">Completed</a>
                                    <a href="#" type="button"
                                        class="btn btn-sm btn-outline-danger">Cancelled</a>
                                </div>
                            </div>
                            <p></p>
                            @endforeach
                        </div>
                    </td>
                    <td colspan="6" class="p-0">
                        <div id="accordion{{$order->id}}" class="accordian-body collapse my-2">
                            <div class="d-flex text-primary fw-bold justify-content-around mb-2">Category</div>
                            @foreach ($order->order_items as $item)
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="my-3">
                                    {{ $item->service->category->title }}
                                    <div class="my-2"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="container mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</section>
@endsection