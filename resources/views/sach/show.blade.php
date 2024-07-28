@extends('layouts.master')
@section('title')
Chi tiết sách
@endsection
@section('content')

<h2>Chi tiết sách</h2>
<div class="table-responsive">
    <table style="border: 1px solid black;" class="table table-striped border table-hover">
        <thead class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Publication date</th>
            <th>Actor</th>
            <th>Quantity</th>
            <th>Created at</th>
            <th>Updated at</th>
        </thead>
        <tbody>
        <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->ten}}</td>
                    <td>
                        <img src="{{asset('uploads')}}/{{$value->anh}}" alt="" class="image-size-index">
                    </td>
                    <td>{{$value->ngay_xuat_ban}}</td>
                    <td>{{$value->tac_gia}}</td>
                    <td>{{$value->so_luong}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a class="btn btn-dark mb-2" href="{{route("sach.index")}}"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
    </div>
</div>
@endsection