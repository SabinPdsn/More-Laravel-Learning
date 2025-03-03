<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route('fileupload')}}" method = 'post' enctype="multipart/form-data">
        @csrf
        <input type="file" name="files[]" multiple>
        <button type="submit">UPLOAD</button>
    </form>

    <div style="color: red">
    @error('files.*')
        {{ $message }}
    @enderror

    </div>


</body>
</html>
