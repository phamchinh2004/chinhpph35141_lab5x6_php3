<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="container">
    @if ($errors->has('error'))
    <div>
        <p class="text-danger">{{ $errors->first('error') }}</p>
    </div>
    @endif
    <h2>Thêm mới user</h2>
    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
            @error('name')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control">
            @error('email')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Type</label>
            <select name="type" id="" class="form-select">
                <option value="nhanVien">Nhân viên</option>
                <option value="truongPhong">Trưởng phòng</option>
            </select>
            @error('type')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Dob</label>
            <input type="date" name="dob" class="form-control">
            @error('dob')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" value="{{old('phone')}}" class="form-control">
            @error('phone')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Address</label>
            <input type="text" name="address" value="{{old('address')}}" class="form-control">
            @error('address')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control">
            @error('password')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-success" type="submit">Done</button>
        </div>
    </form>
</body>

</html>