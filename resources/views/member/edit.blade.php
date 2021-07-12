@extends('layouts.master')

@section('content')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
                            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

                    <div class="card">
                        <h5 class="card-header">Edit Assignment <a href="{{ \URL::to('assignment') }}" style="float: right;" class="btn btn-warning">Back</a></h5>
                        <div class="card-body col-md-10">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-dangar">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="POST" id="update_form" action="{{ \URL::to('assignment') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">ID:</label>
                                    <input type="text" value="{{ $api_id }}" name="api_id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Title:</label>
                                    <input type="text" value="{{ $title }}" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Body:</label>
                                    <textarea class="form-control" rows="5" name="body">{{ $body }}</textarea>
                                </div>
                                <input type="hidden" value="{{ $id }}" name="id">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="" lass="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                         Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>

@endsection

@section('pagescript')

    <script type="text/javascript">
        $( document ).ready(function() {
            $("#update_form").validate({
                rules: {
                    api_id: {
                        required: true,
                        digits: true
                    },
                    title: {
                        required: true,
                    },
                    body: {
                        required: true,
                    },
                },
            }); 
        });
    </script>

@endsection