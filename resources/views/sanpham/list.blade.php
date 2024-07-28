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
    <h2>Danh sách tất cả sản phẩm</h2>
    <table style="border: 1px solid black;" class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Ảnh</th>
            <th>Mô tả</th>
            <th>Lượt xem</th>
            <th>Danh mục</th>
            <th>Phương thức</th>
        </thead>
        <tbody>
            @foreach($listSp as $sp)
                <tr>
                    <td>{{$sp->id}}</td>
                    <td>
                        <a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{route('san-pham.detail',['id'=>$sp->id])}}">{{$sp->name}}</a>
                    </td>
                    <td>{{$sp->price}}</td>
                    <td>{{$sp->img}}</td>
                    <td>{{$sp->mota}}</td>
                    <td>{{$sp->luotxem}}</td>
                    <td>{{$sp->iddm}}</td>
                    <td>
                        <a class="btn btn-warning text-white" href="{{route("san-pham.edit",['id'=>$sp->id])}}">Sửa</a>
                        <a class="btn btn-danger" href="{{route('san-pham.delete',['id'=>$sp->id])}}">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Danh sách các sản phẩm top3</h2>
    <table style="border: 1px solid black;">
        <thead>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
        </thead>
        <tbody>
            @foreach($top3 as $sp)
                <tr>
                    <td>{{$sp->id}}</td>
                    <td>{{$sp->name}}</td>
                    <td>{{$sp->price}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>