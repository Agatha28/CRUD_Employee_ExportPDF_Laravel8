<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>

<table id="customers">

  <tr>
    <th>No</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Phone Number</th>
  </tr>

  <tr>
    <td>{{ $row->nama}}</td>
    <td>{{ $row->jeniskelamin}}</td>
    <td>0{{ $row->notelpon}}</td>
  </tr>
  
</table>

</body>
</html>


