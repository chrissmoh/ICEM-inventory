@extends('request/layout.page')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Request Device</h4>
            </div>
        </div>

        <div class="card w-2">
            <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body  ">
                    <div class="row">

                        <!-- Category of required divice-->
                        <div class="col-lg-6 col-sm-12 w-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Choose Category</option>
                                    <option value="Computers">Computers</option>
                                    <option value="Computers">Keyboard</option>
                                    <option value="Computers">Mouse</option>
                                    <option value="Projectors">Projectors</option>
                                    <option value="Printers">Printers</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Status -->
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Problem of the current device</label>
                               <input type="text" required name="message">
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
