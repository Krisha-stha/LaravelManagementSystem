<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
</head>
<body>
<div align = "center">
  <form action="{{url('upload')}}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div style = "padding:10px;">
      <label>Name</label>
      <input type = "text" name = "name">
    </div>

    <div style = "padding:10px;">
      <label>Email</label>
      <input type = "email" name = "email">
    </div>

    <div style = "padding:10px;">
      <label>Image</label>
      <input type = "file" name = "file">
    </div>

    <div style = "padding:10px;">
      <input type = "submit">
    </div>

  </form>
</div>
</body>
</html>