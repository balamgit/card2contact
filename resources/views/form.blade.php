@extends('base_layouts.app')

@section('content')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">

        @if(session()->has('mymsg'))
            <div class="col-md-7  col-sm-offset-2  ">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i>{{ session()->get('mymsg')}}</h4>
                </div>
            </div>
        @endif
        <div id="mypro" class="col-md-5">
        </div>

        <br/>
        <div class="card">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Browser & upload the image file:
                    <input type="file" id="myfile">
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <form role="form" action="/upload" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Name*</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Phone 1*</label>
                                <input type="text" class="form-control" name="phone1" id="phone1" required>
                            </div>
                            <div class="form-group">
                                <label>Phone 2*</label>
                                <input type="text" class="form-control" name="phone2" id="phone2">
                            </div>
                            <div class="form-group">
                                <label>Mail id*</label>
                                <input type="email" class="form-control" name="mail1" id="mail1">
                            </div>
                            <div class="form-group">
                                <label>Address*</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" style="width: 50%">Submit</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-md-6 float-left">
                        <label>All Texts extracted from the image</label>
                        <textarea rows="12" cols="50" class="form-control" id="alltext"></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
    @endsection

@section('scripts')
    <script src='https://cdn.jsdelivr.net/gh/naptha/tesseract.js@v1.0.14/dist/tesseract.min.js'></script>

    <script>
        $(document).ready(function() {

            function extractEmails ( text ){
                return text.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9._-]+)/gi);
            }


            function extractPhones ( text ){
                return text.match(/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/gm);
            }

           // var myImage='storage/img2.jpg';
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                alert('The file "' + fileName + '" has been selected.');
                var myImage = e.target.files[0];

                Tesseract.recognize(myImage)
                    .progress(function (message) {
                        $('#mypro').html('<div class="progress">\n' +
                            '  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>\n' +
                            '</div>');
                    })
                    .then(data => {
                        console.log('then\n', data.text)
                    })
                    .catch(err => {
                        console.log('catch\n', err);
                    })
                    .finally(data => {
                        $('#mypro').remove();
                        var emails = extractEmails(data.text);
                        var phones = extractPhones(data.text);
                        var x = 1;
                        var y = 1;
                        $.each(emails, function (index, email) {
                            $('#mail' + x).val(email);
                            x++;
                        });
                        $.each(phones, function (index, phone) {
                            $('#phone' + y).val(phone);
                            y++;
                        });
                        $('#alltext').val(data.text);
                    });

            });


        } );
    </script>
    @endsection