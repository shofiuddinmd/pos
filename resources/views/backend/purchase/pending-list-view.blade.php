@extends('backend.layout.master')

@section('home-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Purchase</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                               Pending Purchase List
                            </h3>
{{--                            <a class="btn btn-success btn-sm float-right" href="{{route('purchase-add')}}"><i class="fa fa-plus-circle"></i>Add Purchase</a>--}}

                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <table id="example1" class="table table-bordered table-hover table-responsive" >
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Purchase No</th>
                                        <th>Date</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Buying Price</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $purchase)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$purchase->purchase_no}}</td>
                                        <td>{{date('d-m-y',strtotime($purchase->date))}}</td>
                                        <td>{{$purchase['supplier']['name']}}</td>
                                        <td>{{$purchase['category']['name']}}</td>
                                        <td>{{$purchase['product']['name']}}</td>
                                        <td>{{$purchase->description}}</td>
                                        <td>{{$purchase->buying_qty}}
                                            {{$purchase['product']['unit']['name']}}</td>
                                        <td>{{$purchase->unit_price}}</td>
                                        <td>{{$purchase->buying_price}}</td>
                                        <td>@if($purchase->status=='0')
                                            <span style="background-color: brown;padding: 5px">Pending</span>
                                            @elseif($purchase->status=='1')
                                            <span style="background-color:green;padding: 5px">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{--                                                    <a class="btn btn-sm btn-success" title="edit" href="{{route('purchase-edit',$purchase->id)}}"><i class="fa fa-edit"></i></a>--}}
                                            @if($purchase->status=='0')
                                            <a class="btn btn-sm btn-success" id="approveBtn" title="approve" href="{{route('purchase-approve',$purchase->id)}}"><i class="fa fa-check-circle"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection



