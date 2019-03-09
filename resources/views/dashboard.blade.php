@extends('base_layouts.app')

@section('content')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Table</h3>
                <a href="#" title="add new products" data-toggle="modal" data-target="#IdAddProductModal" style="padding-left: 20px;"><i class="fa fa-plus fa-lg"></i></a>
                <a href="#" title="Edit products" id="IdThrowEdit" style="padding-left: 20px;"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                <a href="#" title="Delete selected products" id="IdThrowDelete" class="pull-right" style="padding-right: 30px;"><i class="fa fa-trash-o fa-lg"></i></a>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="IdDataTable" class="table table-bordered table-striped text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Price in Rs</th>
                        <th>UOM</th>
                        <th>Image</th>
                        <th>updated_at</th>
                        <th>created_at</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/.row-->
    @endsection

@section('scripts')
         <script>
             $(document).ready(function() {
                 var table= $('#IdDataTable').DataTable({
                     stateSave: true,
                     "scrollX": true,
                     select: true,
                 });
                 //table initialztn end



             } );
         </script>
    @endsection