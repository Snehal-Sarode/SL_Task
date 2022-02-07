<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Application List</title>
    <style>
         .alert-success
         {
          margin-left: 470px;
          margin-right: 470px;
         }
  </style>
  </head>
  <body>
    @if(session()->has("success"));
          <div class="alert alert-success">
            {{ session("success") }}  
          </div>
          @endif

        @section("content")
        @show
      <br>
        <div class="container">            
            <!-- <hr> -->
            <!-- <h3 align="center">Add Enquiry</h3> -->
            <div class="col-md-12 text-center">
              <a class="btn btn-success text-justify" href="{{ route('laraform.create') }}"><i class="fas fa-plus"></i>&nbsp Add Enquiry</a>
            </div>
<!-- 
            <hr> -->

            <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Talk Title</th>
                <th>Profile Photo</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($contact_data as $contact)
            <tr>
                <td>{{ $loop->iteration  }}</td>
                <td>{{ $contact->firstname }}</td>
                <td>{{ $contact->lastname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->mobile }}</td>
                <td>{{ $contact->talk_title }}</td>
                <td><img style="height: 80px; width: 100px;" src="{{asset('images/'.$contact->image)}}"></td>

                <td>{{ date('d-m-Y', strtotime($contact->created_at)) }}</td>
                <td>
                <a href="{{ route('laraform.show', $contact->id) }}" class="text-success"><i class="fas fa-eye"></i></a>
                <a href="{{ route('laraform.edit', $contact->id) }}" class="text-info"><i class="fas fa-edit"></i></a>
                <a href="#" onclick="if (confirm('Are you sure want to delete?')) { $('#frm-delete-data-{{ $contact->id}}').submit() }" class="text-danger"><i class="far fa-trash-alt"></i></a>

                <form action="{{ route('laraform.destroy', $contact->id) }}" id="frm-delete-data-{{ $contact->id}}" method="POST">
                
                @csrf
                @method("delete")
                </form>
                </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <script>
          $(document).ready(function() {
              $('#example').DataTable();
          } );
        </script>
  </body>
</html>