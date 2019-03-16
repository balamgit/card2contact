@extends('base_layouts.app')

@section('content')
    @include('modals.delete')
    @include('modals.notify')
    <!--row for porduct table-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="box-title" style="display: inline;">Contacts</h3>
                <button class="btn btn-success" id="expo">Export as vcard</button>
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
<script src="js/vcard.js"></script>
    <script>
        $(document).ready(function() {
            var table= $('#IdDataTable').DataTable({
                stateSave: true,
                "scrollX": true,
                select: true,
            });

      function makeVcard() {
          var name='';
          var phone='';
          var mail='';
          var address='';
          $.map(table.rows('.selected').data(), function (item) {
              name=item[1];
              phone=item[2];
              mail=item[4];
              address=item[5]+';;street;city;state;zip code;country';
          });

          // Without helper methods
          var mycard = vCard.create(vCard.Version.FOUR)
          mycard.add(vCard.Entry.NAME, ''+name+';'+';;')
          mycard.add(vCard.Entry.FORMATTEDNAME, name)
          mycard.add(vCard.Entry.PHONE, phone, vCard.Type.CELL)
          mycard.add(vCard.Entry.EMAIL, mail, vCard.Type.WORK)
          mycard.add(vCard.Entry.EMAIL, mail, vCard.Type.HOME)
          mycard.add(vCard.Entry.ADDRESS, address, vCard.Type.HOME)
          var link = vCard.export(mycard, name, true) // use parameter true to force download
          document.body.appendChild(link)
      }

      $('#expo').click(function () {
          var ids=[];
          $.map(table.rows('.selected').data(), function (item) {
              ids.push(item[0]);
          });
          if (ids.length>0 && ids.length===1){
              makeVcard();
          }
          else {
              alert('select any one');
          }
      });


        } );
    </script>
    @endsection