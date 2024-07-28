@extends('layouts.master')
@section('title')
Chi tiết nhạc sĩ
@endsection
@section('content')

<h2>Chi tiết nhạc sĩ</h2>
<div class="table-responsive">
    <table style="border: 1px solid black;" class="table table-striped border table-hover">
        <thead class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Songs</th>
            <th>Date of birth</th>
            <th>Hometown</th>
            <th>Created at</th>
            <th>Updated up</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$dataNhacSi->id}}</td>
                <td>{{$dataNhacSi->ten}}</td>
                <td><img src="{{asset('uploads/' . $dataNhacSi->anh)}}" class="image-size-index" alt=""></td>
                <td>
                    <ol class="list-group list-group-numbered scrollable-table-show">
                        @foreach ($dataAmNhac as $amNhac)
                            <li class="list-group-item text-success fw-bold">{{$amNhac->ten}}</li>
                        @endforeach
                    </ol>
                </td>
                <td>{{$dataNhacSi->ngay_sinh}}</td>
                <td>{{$dataNhacSi->que_quan}}</td>
                <td>{{$dataNhacSi->created_at}}</td>
                <td>{{$dataNhacSi->updated_at}}</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <a class="btn btn-dark mb-2" href="{{route("nhacSi.index")}}"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
    </div>
</div>
@endsection