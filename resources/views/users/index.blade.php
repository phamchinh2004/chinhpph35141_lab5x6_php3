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
    @if(session('message'))
    <div>
        <p class="text-success">{{session('message')}}</p>
    </div>
    @endif
    <h2>Danh sách users</h2>
    <div class="d-flex justify-content-end">
        <a href="{{route('userCreate')}}" class="btn btn-success mb-3">Thêm mới user</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Type</th>
                <th class="text-center">Dob</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Image</th>
                <th class="text-center">Created_at</th>
                <th class="text-center">Updated_at</th>
                <th class="text-center">Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $key=> $user)
            <tr>
                <td class="text-center">{{$key}}</td>
                <td class="text-center">{{$user->name}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{$user->type}}</td>
                <td class="text-center">{{$user->dob}}</td>
                <td class="text-center">{{$user->phone}}</td>
                <td class="text-center">
                    @if ($user->image)
                    <img src="{{asset('uploads')}}/{{$user->image}}" alt="" width="50px">
                    @endif
                </td>
                <td class="text-center">{{$user->created_at}}</td>
                <td class="text-center">{{$user->updated_at}}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="" class="btn btn-dark me-2">Detail</a>
                        <a href="{{route('userEdit',$user->id)}}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{route('userDelete',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a class="btn btn-danger" href="{{route('logout')}}">Đăng xuất</a>
    </div>
</body>

</html>