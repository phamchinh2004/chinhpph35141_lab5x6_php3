@extends('layouts.master')
@section('title')
Chỉnh sửa nhạc sĩ
@endsection
@section('content')
<div class="d-flex justify-content-center">
    <h2>Chỉnh sửa nhạc sĩ</h2>
    @if (isset($session['error']) && $session['error'])
        <div>{{$session['error']}}</div>
    @endif
</div>
<div>
    <form action="{{route("nhacSi.update", $oldDataNhacSi->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="fw-bold">Name <span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" value="{{$oldDataNhacSi->ten}}" name="ten"
                placeholder="Enter your name">
            @error('ten')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            @if ($oldDataNhacSi->anh)
                <label for="" class="fw-bold">Old Image</label>
                <div class="d-flex justify-content-center align-item-center p-3 border rounded">
                    <img src="{{asset('uploads/' . $oldDataNhacSi->anh)}}" alt="" class="image-size-edit">
                </div>
            @endif
            <label for="" class="fw-bold">Upload new image <span style="color:red;">(*)</span></label>
            <input type="file" class="form-control" name="anh">
            @error('anh')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="fw-bold">Date of birth <span style="color:red;">(*)</span></label>
            <input type="text" class="form-control mb-2" value="Old: {{$oldDataNhacSi->ngay_sinh}}" disabled>
            <input type="date" class="form-control" {{old('ngay_sinh')}} name="ngay_sinh"
                placeholder="Enter your date of birth">
            @error('ngay_sinh')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="fw-bold">Hometown <span style="color:red;">(*)</span></label>
            <input type="text" class="form-control" value="{{$oldDataNhacSi->que_quan}}" name="que_quan"
                placeholder="Enter your hometown">
            @error('que_quan')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="newSongs" class="fw-bold">Songs <span style="color:red;">(*)</span></label>
            <select id="newSongs" type="text" class="form-select" name="songs[]" placeholder="Enter your songs"
                multiple></select>
            @error('songs')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button class="btn btn-success" type="submit" name="submitBtn"><i
                    class="fa-solid fa-plus fa-sm me-2"></i>Done</button>
        </div>
    </form>
</div>
<div class="d-flex justify-content-center mt-3">
    <a class="btn btn-dark mb-2" href="{{route("nhacSi.index")}}"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
</div>
<!-- <div class="mb-3">
    <label for="song" class="fw-bold">Available Songs</label>
    <select id="song" name="songs[]" id="" class="form-select" multiple>
        @foreach ($dataAmNhac as $amNhac)
            <option class="" value="{{$amNhac->id}}">{{$amNhac->ten}}</option>
        @endforeach
    </select>
</div> -->
@endsection