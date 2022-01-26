<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>EMPLOYEE CRUD LARAVEL 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Employee's Data</h1>

    <div class="container">
        <a href="/addemployee" class="btn btn-success">+Add Data</a>
        <div class="row">
       @if($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
       @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                @php
                  $no = 1;
                @endphp
                @foreach ($data as $row)
                  <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama}}</td>
                    <td>
                      <img src="{{ asset('fotopegawai/'.$row->foto )}}" alt="" style="width:40px;">
                    </td>
                    <td>{{ $row->jeniskelamin}}</td>
                    <td>0{{ $row->notelpon}}</td>
                     <td>{{ $row->created_at -> format('D M Y')}}</td>
                    <td>
                       
                        <a href="/showdata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}">Delete</a>
                    </td>
                  </tr> 
                  @endforeach

                </tbody>
              </table>
        </div>
    </div>

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $('.delete').click( function(){
      swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your imaginary file is safe!");
              }
            });
    });
</script>
</html>