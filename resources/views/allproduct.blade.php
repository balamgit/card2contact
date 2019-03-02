@extends('base_layouts.app')

@section('content')
    @include('modals.addproduct')
    @include('modals.editproduct')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <br/>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Products</h3>
                <a href="#" title="add new products" data-toggle="modal" data-target="#IdAddProductModal" style="padding-left: 20px;"><i class="fa fa-plus fa-lg"></i></a>
                <a href="#" title="Edit products" id="IdThrowEdit" style="padding-left: 20px;"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                <a href="#" title="Delete selected products" id="IdThrowDelete" class="pull-right" style="padding-right: 30px;"><i class="fa fa-trash-o fa-lg"></i></a>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="IdProductTable" class="table table-bordered table-striped text-center" style="width:100%">
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
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->uom}}</td>
                        <td><a href="{{asset('/storage/products/'.$product->image)}}" target="_blank">{{$product->image}}</a></td>
                        <td>{{$product->updated_at}}</td>
                        <td>{{$product->created_at}}</td>
                    </tr>
                        @endforeach
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
                 function commonajax(urls,el,hider){
                     $.ajax({
                         url: urls,
                         type: 'POST',
                         data:new FormData(el),
                         contentType:false,
                         processData:false,
                         success:function(result)
                         {
                             $('#IdMyResults').html(result);
                             $('#'+hider).modal('hide');
                             $('#IdAlertModal').modal('show');
                         },
                         error: function(result){
                             var errors = result.responseJSON;
                             var errorsHtml = '';
                             $.each(errors.errors, function( key, value ) {
                                 errorsHtml += '<li>'+value[0]+'</li> ';
                             });
                             $('#IdMyResults').html('<div class="col-md-7 col-sm-offset-2"> ' +
                                 '<div class="alert alert-danger alert-dismissible"> ' +
                                 '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' +
                                 '<ul> ' +errorsHtml +
                                 '</ul> </div> ' +
                                 '</div>');
                             $('#'+hider).modal('hide');
                             $('#IdAlertModal').modal('show');
                             // Render the errors with js ...
                         }
                     });//ajax
                 }

                 var table= $('#IdProductTable').DataTable({
                     stateSave: true,
                     "scrollX": true,
                     select: true,
                 });
                 //table initialztn end

                 //function to get selected id
                 function getids(){
                     var ids =[];
                     $.map(table.rows('.selected').data(), function (item) {
                         ids.push(item[0]);
                     });
                     //console.log(ids);
                     return ids;
                 }

                //add product
                 $('#IdAddProductForm').on('submit',function (e) {
                     e.preventDefault();
                     var urls='/product/create';
                     commonajax(urls,this,'IdAddProductModal');
                 });
                 //Edit product
                 $('#IdEditProductForm').on('submit',function (e) {
                     e.preventDefault();
                     var urls='/product/update';
                     commonajax(urls,this,'IdEditProductModal');
                 });

                 //delete product
                 $('#IdDeleteForm').on('submit',function (e) {
                     e.preventDefault();
                     var urls='/product/delete';
                     commonajax(urls,this,'IdDeleteModal');
                 });

                 //throw edit
                 $('#IdThrowEdit').click(function () {
                     var refid =getids();

                     if(refid.length>1 || refid.length<=0){
                         alert('kindly select any one row');
                     }
                     else {
                         $.ajax({
                             url: '/product/fetch',
                             type: 'POST',
                             data:{_token:"{{csrf_token()}}",id:refid},
                             success:function(result)
                             {
                                var obj=JSON.parse(result);
                                 $('#eproduct').val(obj[0].product);
                                 $('#eprice').val(obj[0].price);
                                 $('#euom').val(obj[0].uom);
                                 $('#GetId').val(refid);
                                 $('#IdEditProductModal').modal('show');
                             }
                         });//ajax
                     }//else
                 });

                 //throw delete
                 $('#IdThrowDelete').click(function () {
                     var refid =getids();
                     if(refid.length>1 || refid.length<=0){
                         alert('kindly select any one row');
                     }
                     else {
                         $('#DeleteId').val(refid);
                         $('#IdDeleteModal').modal('show');
                     }//else
                 });


                 $('#IdRefreshClick').click(function () {
                     $(location).attr('href','{{route(\Illuminate\Support\Facades\Route::currentRouteName())}}')
                 });

             } );
         </script>
    @endsection