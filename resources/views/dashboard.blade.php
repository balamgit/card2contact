@extends('base_layouts.app')

@section('content')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Contacts</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
                <table id="IdDataTable" class="table table-bordered table-striped text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Phone1</th>
                        <th>Phone2</th>
                        <th>mail1</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dat)
                        <tr>
                            <td>{{$dat->id}}</td>
                            <td>{{$dat->name}}</td>
                            <td>{{$dat->phone1}}</td>
                            <td>{{$dat->phone2}}</td>
                            <td>{{$dat->mail1}}</td>
                            <td>{{$dat->address}}</td>
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
    <script src='https://cdn.jsdelivr.net/gh/naptha/tesseract.js@v1.0.14/dist/tesseract.min.js'></script>

    <script>
        $(document).ready(function() {
            var table= $('#IdDataTable').DataTable({
                stateSave: true,
                "scrollX": true,
                select: true,
            });
        } );
    </script>
    @endsection