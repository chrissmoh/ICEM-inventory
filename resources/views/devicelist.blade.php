@extends('layout.app')
@section('content')
    <div class="content">
        @php
            use App\Models\Device;
            $devices = Device::all(); // Retrieve all devices from database
        @endphp

        <div class="page-header">
            <div class="page-title">
                <h4>Device List</h4>
                <h6>Manage your devices</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('device.create') }}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}"
                        alt="img" class="me-1">Add New Device</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- Search and filter controls remain the same -->

                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>
                                <th>Device Name</th>
                                <th>Category</th>
                                <th>Serial Number</th>
                                <th>Quantity</th>
                                <th>Purchase Date</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $device)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td class="productimgname">
                                        <a href="javascript:void(0);" class="product-img">
                                            @if ($device->device_image)
                                                <img src="{{ asset('storage/' . $device->device_image) }}" alt="product">
                                            @else
                                                <img src="{{ asset('assets/img/product/product17.jpg') }}" alt="product">
                                            @endif
                                        </a>
                                        <a href="javascript:void(0);">{{ $device->device_name }}</a>
                                    </td>
                                    <td>{{ $device->category }}</td>
                                    <td>{{ $device->serial_number }}</td>
                                    <td>{{ $device->quantity }}</td>
                                    <td>{{ \Carbon\Carbon::parse($device->purchase_date)->format('d M Y') }}
                                    </td>
                                    <td>
                                        @if ($device->status == 'active')
                                            <span class="badges bg-lightgreen">Active</span>
                                        @else
                                            <span class="badges bg-lightred">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $device->created_by ?? 'Admin' }}</td>
                                    <td>
                                        <a class="me-3" href="product-details.html">
                                            <img src="{{ asset('assets/img/icons/eye.svg') }}" alt="img">
                                        </a>
                                        <a class="me-3" href="editproduct.html">
                                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <a class="confirm-text" href="javascript:void(0);">
                                            <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
