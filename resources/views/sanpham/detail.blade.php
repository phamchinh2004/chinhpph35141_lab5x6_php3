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
    <form action="" >
        <h1>Chi tiết sản phẩm</h1>
        <label for="">ID sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->id}}" disabled>
        <label for="">Tên sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->name}}" disabled>
        <label for="">Giá sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->price}}" disabled>
        <label for="">Mô tả sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->mota}}" disabled>
        <label for="">Lượt xem sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->luotxem}}" disabled>
        <label for="">Danh mục sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->iddm}}" disabled>
        <div class="mt-4 d-flex justify-content-center">
            <a class="btn btn-dark" href="{{route('san-pham.list')}}">Quay lại</a>
        </div>
    </form>
</body>
</html>