<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="container">
    <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div>
            <label>Tên đăng nhập</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            @error('username')
            <div>
                <p class="text-danger">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div>
            <label>Mật khẩu</label>
            <input type="password" class="form-control" name="password">
            @error('password')
            <div>
                <p class="text-danger">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Đăng nhập</button>
        @if($errors->has('message'))
        <div>
            <p class="text-danger">{{ $errors->first('message') }}</p>
        </div>
        @endif
        @if(session('khongDuQuyen'))
        <p class="text-danger">{{session('khongDuQuyen')}}</p>
        @endif
    </form>
</body>

</html>