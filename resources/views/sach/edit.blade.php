@extends('layouts.master')
@section('title')
Chỉnh sửa sách
@endsection
@section('content')

<div class="d-flex justify-content-center">
    <h2>Chỉnh sửa sách</h2>
</div>
<div>
    <form action="{{route('sach.update', $oldDataSach->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="fw-bold">Name<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" value="{{$oldDataSach->ten}}" name="ten" placeholder="Enter name">
            @error('ten')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            @if ($oldDataSach->anh)
                <label for="" class="fw-bold">Old Image</label>
                <div class="d-flex justify-content-center align-item-center p-3 border rounded">
                    <img src="{{asset('uploads/' . $oldDataSach->anh)}}" alt="" class="image-size-edit">
                </div>
            @endif
            <label for="" class="fw-bold">Photo<span style="color:red;">(*)</span></label>
            <input type="file" class="form-control" name="anh">
            @error('anh')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="fw-bold">Publication date<span style="color:red;">(*)</span></label>
            <input type="date" class="form-control" {{$oldDataSach->ngay_xuat_ban}} name="ngay_xuat_ban"
                placeholder="Enter ngay_xuat_ban">
            @error('ngay_xuat_ban')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="fw-bold">Actor<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" value="{{$oldDataSach->tac_gia}}" name="tac_gia"
                placeholder="Enter actor">
            @error('tac_gia')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="fw-bold">Quantity<span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" value="{{$oldDataSach->so_luong}}" name="so_luong"
                placeholder="Enter quantity">
            @error('so_luong')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-warning" type="submit" name="submitBtn"><i
                    class="fa-solid fa-plus fa-sm me-2"></i>Done</button>
        </div>
    </form>
</div>
<div class="d-flex justify-content-center mt-3">
    <a class="btn btn-dark mb-2" href="{{route("sach.index")}}"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
</div>
@endsection