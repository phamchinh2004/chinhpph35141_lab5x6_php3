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
    <form action="">
        <h1>Sửa sản phẩm</h1>
        <label for="">ID sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->id}}" disabled>
        <label for="">Tên sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->name}}">
        <label for="">Giá sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->price}}">
        <label for="">Mô tả sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->mota}}">
        <label for="">Lượt xem sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->luotxem}}">
        <label for="">Danh mục sản phẩm</label>
        <input class="form-control" type="text" value="{{$detail->iddm}}">
        <div class="mt-4 d-flex justify-content-center">
            <a class="btn btn-dark" href="{{route('san-pham.list')}}">Quay lại</a>
            <a class="btn btn-warning ms-4 fw-bold" href="{{route('san-pham.list')}}">Cập nhật</a>
        </div>
    </form>
</body>

</html>