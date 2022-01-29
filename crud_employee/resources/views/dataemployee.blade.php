<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>EMPLOYEE CRUD LARAVEL 8</title>
  </head>
  <body>
    <h1 class="text-center mb-4">Employee's Data</h1>

    <div class="container">
        <a href="/addemployee" class="btn btn-success">+Add Data</a>
        <div class="row g-3 align-items-center mt-2">
              <div class="col-auto">
                <form action="/employee" method="GET">
                  <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
                </form>
              </div>

              <div class="col-auto">
                  <a href="#" class="btn btn-info">Export PDF</a>
              </div>
              
            </div>
        <div class="row">
      <!-- @if($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
       @endif -->
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
                @foreach ($data as $index => $row)
                  <tr>
                    <th scope="row">{{ $index + $data-> firstItem() }}</th>
                    <td>{{ $row->nama}}</td>
                    <td>
                      <img src="{{ asset('fotopegawai/'.$row->foto )}}" alt="" style="width:40px;">
                    </td>
                    <td>{{ $row->jeniskelamin}}</td>
                    <td>0{{ $row->notelpon}}</td>
                     <td>{{ $row->created_at -> format('D M Y')}}</td>
                    <td>
                       
                        <a href="/showdata/{{ $row->id }}" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}" >Delete</a>
                    </td>
                  </tr> 
                  @endforeach

                </tbody>
              </table>
              {{ $data->links() }}
        </div>
    </div>

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

 
  <script>
    $('.delete').click( function(){
      var employeeid = $(this).attr('data-id');
      var name = $(this).attr('data-nama');
      swal({
              title: "Are you sure?",
              text: "You are deleting this data with name "+name+" ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              window.location = "/delete/"+employeeid+""
              if (willDelete) {
                swal("Deleting data success!", {
                  icon: "success",
                });
              } else {
                swal("Data is not deleted!");
              }
            });
    });
</script>


<script>
    @if (Session::has('success')) 
      toastr.success("{{Session::get('success')}}")
    @endif
</script>
</html>