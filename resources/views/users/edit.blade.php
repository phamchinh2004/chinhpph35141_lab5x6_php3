<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .image-size-edit {
            width: 200px;
        }
    </style>
</head>

<body class="container">
    @if ($errors->has('error'))
    <div>
        <p class="text-danger">{{ $errors->first('error') }}</p>
    </div>
    @endif
    @if (session('error'))
    <div>
        <p class="text-danger">{{ session('error')}}</p>
    </div>
    @endif
    <h2>Chỉnh sửa user</h2>
    <form action="{{route('update',$user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control">
            @error('name')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control">
            @error('email')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Type</label>
            <select name="type" id="" class="form-select">
                <option value="nhanVien" {{$user->type=='nhanVien'?'selected':''}}>Nhân viên</option>
                <option value="truongPhong" {{$user->type=='truongPhong'?'selected':''}}>Trưởng phòng</option>
            </select>
            @error('type')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Old dob:</label>
            <input type="text" value="{{$user->dob}}" class="form-control" disabled>
            <label for="">New dob</label>
            <input type="date" name="dob" class="form-control">
            @error('dob')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" value="{{$user->phone}}" class="form-control">
            @error('phone')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Address</label>
            <input type="text" name="address" value="{{$user->address}}" class="form-control">
            @error('address')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            @if ($user->image)
            <label for="" class="fw-bold">Old Image</label>
            <div class="d-flex justify-content-center align-item-center p-3 border rounded">
                <img src="{{asset('uploads/' . $user->image)}}" alt="" class="image-size-edit">
            </div>
            @endif
            <label for="">New image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">Old password</label>
            <input type="password" name="oldPassword" class="form-control">
            @error('oldPassword')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div>
            <label for="">New password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <div>
                <p class="text-danger">{{$message}}</p>
            </div>
            @enderror
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
    </form>
</body>

</html>