@extends('layouts.app')

@section('content')
    <div class="main-wrapper">
        @include('components.header')  <!-- This line includes the header component -->
        @include('components.sidebar')  <!-- This line includes the sidebar component -->

        <div class="page-wrapper">
            <div class="content">
                @include('components.dashboard_widgets')  <!-- Include dashboard widgets -->

                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Device Overview</h5>
                                <div class="graph-sets">
                                    <ul>
                                        <li><span>Available</span></li>
                                        <li><span>Assigned</span></li>
                                    </ul>
                                    <div class="dropdown">
                                        <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            2025 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a href="javascript:void(0);" class="dropdown-item">2025</a></li>
                                            <li><a href="javascript:void(0);" class="dropdown-item">2024</a></li>
                                            <li><a href="javascript:void(0);" class="dropdown-item">2023</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="sales_charts"></div>  <!-- Placeholder for your sales chart -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Recently Added Devices</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a href="productlist.html" class="dropdown-item">Device List</a></li>
                                        <li><a href="addproduct.html" class="dropdown-item">Add Device</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('components.table')  <!-- Include the table component -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
