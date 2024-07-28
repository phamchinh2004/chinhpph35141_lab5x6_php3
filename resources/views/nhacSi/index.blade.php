@extends('layouts.master')
@section('title')
Danh sách tất cả nhạc sĩ
@endsection
@section('content')
<!-- @if (isset($session['success']) && $session['success']) -->
<div class="text-success">{{$session['seccess']}}</div>
<!-- @endif -->
<div class="d-flex justify-content-center">
    <h3>Danh sách tất cả nhạc sĩ</h3>
    @if (isset($session['error']) && $session['error'])
        <div>{{$session['error']}}</div>
    @endif
</div>
<div class="d-flex justify-content-end">
    <a class="btn btn-success mb-2" href="{{route('nhacSi.create')}}"><i class="fa-solid fa-plus fa-sm"></i></a>
</div>
<div class="scrollable-table-index">
    <table style="border: 1px solid black;" class="table table-borderless border table-hover">
        <thead class="table-dark sticky-md-top">
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Date of birth</th>
            <th>Hometown</th>
            <th>Created at</th>
            <th>Updated up</th>
            <th>Control</th>
        </thead>
        <tbody>
            @foreach($dataAll as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->ten}}</td>
                    <td>
                        <!-- <img src="{{Storage::url($value->anh)}}" alt="" class="image-size-index"> -->
                        <!-- <img src="{{asset("public/uploads/" . $value->anh)}}" alt="" class="image-size-index"> -->
                        <img src="{{asset('uploads')}}/{{$value->anh}}" alt="" class="image-size-index">
                    </td>
                    <td>{{$value->ngay_sinh}}</td>
                    <td>{{$value->que_quan}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                        <div class="d-flex justify-content-around align-item-center">
                            <a class="btn btn-dark text-white" href="{{route("nhacSi.show", $value->id)}}">
                                <i class="fa-solid fa-eye fa-xs text-white"></i></a>
                            <a class="btn btn-warning text-white" href="{{route("nhacSi.edit", $value->id)}}">
                                <i class="fa-solid fa-pen-to-square fa-xs text-white"></i></a>
                            <!-- <a class="btn btn-danger" href="{{route('nhacSi.destroy',['id'=>$value->id])}}">Delete</a> -->
                            <form action="{{route('nhacSi.destroy', $value->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')"><i
                                        class="fa-solid fa-trash fa-xs text-white"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="table-dark sticky-md-bottom">
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Date of birth</th>
            <th>Hometown</th>
            <th>Created at</th>
            <th>Updated up</th>
            <th>Control</th>
        </tfoot>
    </table>
</div>
@endsection