@extends('layouts.master')
@section('title')
Danh sách tất cả sách
@endsection
@section('content')
<!-- @if (isset($session['success']) && $session['success']) -->
<div class="text-success">{{$session['seccess']}}</div>
<!-- @endif -->
<div class="d-flex justify-content-center">
    <h3>Danh sách tất cả sách</h3>
</div>
<div class="d-flex justify-content-end">
    <a class="btn btn-success mb-2" href="{{route('sach.create')}}"><i class="fa-solid fa-plus fa-sm"></i></a>
</div>
<div class="scrollable-table-index">
    <table style="border: 1px solid black;" class="table table-borderless border table-hover">
        <thead class="table-dark sticky-md-top">
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Publication date</th>
            <th>Actor</th>
            <th>Quantity</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Control</th>
        </thead>
        <tbody>
            @foreach($dataAll as $value)
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
                    <td>
                        <div class="d-flex justify-content-around align-item-center">
                            <a class="btn btn-dark text-white" href="{{route("sach.show", $value->id)}}">
                                <i class="fa-solid fa-eye fa-xs text-white"></i></a>
                            <a class="btn btn-warning text-white" href="{{route("sach.edit", $value->id)}}">
                                <i class="fa-solid fa-pen-to-square fa-xs text-white"></i></a>
                            <form action="{{route('sach.destroy', $value->id)}}" method="POST">
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
            <th>Publication date </th>
            <th>Actor</th>
            <th>Quantity</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Control</th>
        </tfoot>
    </table>
</div>
@endsection