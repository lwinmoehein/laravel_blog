<!DOCTYPE html>
<html>
<body>

<form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
  Select image to upload:
  @csrf
  @method('put')

  <input type="file" name="image" id="fileToUpload">
  <input type="text" name="imageable_id" id="fileToUpload">

  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
