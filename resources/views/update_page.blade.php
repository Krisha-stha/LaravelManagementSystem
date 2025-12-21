<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
</head>
<body>
  <h1>Update Page</h1>

  <!-- {{$student->name}}
  {{$student->email}}
  <img src ="/student/{{student->image}}"> -->

  <form action ="{{url('update',$student->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <label>Student name</label>
      <input type = "text" name = "name" value="{{$student->name}}">
    </div>

    <div>
      <label>Student Email</label>
      <input type = "text" name = "email" value="{{$student->email}}">
    </div>

    <div>
      <label>Old Image</label>
      <img height="120" width ="120" src ="/student/{{student->image}}">
    </div>

    <div>
      <label>Change the image</label>
      <input type = "file" name="file">
    </div>

    <div>
      <input type = "submit" value="Update">
    </div>

  </form>

</body>
</html>