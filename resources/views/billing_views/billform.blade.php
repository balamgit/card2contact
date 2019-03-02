@extends('base_layouts.app')

@section('content')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Create Bill</h3>
                </div>
                <form role="form" action="/bill/create" method="POST">

                <!-- /.box-header -->
                <div class="box-body">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Customer name (Optional)</label><br/>
                                <input type="text" class="form-control" name="customer" placeholder="customer name">
                            </div>
                            <div class="col-md-6">
                                <label>Contact no (Optional)</label><br/>
                                <input type="number" class="form-control" name="customer" placeholder="contact number">
                            </div>
                        </div>

                        <div class="default_product_fields">

                        </div>
                </div>
                <div class="box-footer bottom">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
        <!--./col of bill form end-->
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">select products</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                </div>
            </div>
        </div>



    </div>
    <!--/.container-fluid-->
    @endsection

@section('scripts')
         <script>
             $(document).ready(function() {
                 $('#example').DataTable();
             } );
         </script>
    @endsection