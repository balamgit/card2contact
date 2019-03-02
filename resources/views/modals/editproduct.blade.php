<div class="modal fade" id="IdEditProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Product</h4>
            </div>
            <form id="IdEditProductForm" method="post">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="ids" id="GetId" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Product name*</label><br/>
                        <input type="text" class="form-control" id="eproduct" name="product" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Today Price in Rs*</label><br/>
                        <input type="number" class="form-control" id="eprice" name="price" value="" required>
                    </div>
                    <div class="form-group">
                        <label>UOM*</label><br/>
                        <input type="text" class="form-control" id="euom" name="uom" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->