@extends('layout.app')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Device</h4>
            </div>
        </div>

        <div class="card">
            <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!-- Device Name -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Device Name</label>
                                <input type="text" name="device_name" class="form-control" required>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Choose Category</option>
                                    <option value="Computers">Computers</option>
                                    <option value="Projectors">Projectors</option>
                                    <option value="Printers">Printers</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Serial Number -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Serial Number</label>
                                <input type="text" name="serial_number" id="serial_number" class="form-control" required>
                            </div>
                        </div>

                        <!-- Barcode/RFID Section -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Barcode/RFID</label>
                                <div class="input-group">
                                    <input type="text" name="barcode" id="barcode" class="form-control" readonly>
                                    <button type="button" class="btn btn-primary" id="generate_barcode">Generate</button>
                                </div>
                                <div class="mt-2 text-center">
                                    <svg id="barcode-preview" style="display: none;"></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Quantity -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                        </div>

                        <!-- Purchase Date -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <input type="date" name="purchase_date" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Status -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Device Image</label>
                            <div class="image-upload">
                                <input type="file" name="device_image" class="form-control" accept="image/*">
                                <div class="image-uploads">
                                    <img src="assets/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" name="" class="btn btn-submit me-2">Submit</button>
                        <button type="cancel" class="btn btn-cancel">Cancel</button>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
