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
                            <h2 class="pageheader-title">E-commerce Dashboard Template <a href="{{ \URL::to('assignment/load_data') }}" style="float: right;" class="btn btn-warning">load data</a></h2>
                            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibu s at enim quis massa lobortis rutrum.</p>
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
                    <table id="workarea" class="table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($assignments as $key => $assignment) : ?>
                                <tr>
                                    <td>{{ $assignment->api_id }}</td>
                                    <td>{{ $assignment->title }}</td>
                                    <td>{{ $assignment->body }}</td>
                                    <td>
                                        <a class="btn btn-small btn-primary" href="{{ \URL::to('assignment/'.$assignment->id.'/edit') }}">Edit</a> 
                                    </td>
                                    <td>
                                        <a class="btn btn-small btn-danger delete_assignment" assignment_id="{{ $assignment->id }}" href="{{ \URL::to('assignment/delete_record/'.$assignment->id) }}">Delete</a> 
                                    </td>
                                </tr>
                            <?php endforeach ; ?>
                        </tbody>
                    </table>

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
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script type="text/javascript">
        const loadDataTable = () => {
            $('#workarea').DataTable( {
                dom: 'Bfrtip',
                buttons: ['copy','csv','excel','pdf'],
                select: true
            });
        }
        $(document).on("click",".delete_assignment",event => {
            event.preventDefault();
            if (confirm("Are you sure do you want to delete this record ?")) {
                window.location.href = event.target.href;
            } else {
                alert('Your record is safe!')
            }
        });
        $(document).ready(event=>loadDataTable());
    </script>

@endsection