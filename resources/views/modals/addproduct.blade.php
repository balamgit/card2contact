<div class="modal fade" id="IdAddProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Product</h4>
            </div>
            <form id="IdAddProductForm" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                      <label>Product name*</label><br/>
                      <input type="text" class="form-control" name="product" required>
                    </div>
                    <div class="form-group">
                        <label>Today Price in Rs*</label><br/>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                    <div class="form-group">
                        <label>UOM*</label><br/>
                        <input type="text" class="form-control" name="uom" required>
                    </div>
                    <div class="form-group">
                        <label>Product name*</label><br/>
                        <input type="file" name="image">
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