<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    public function list()
    {
        $sql = DB::table('sanpham', 'sp')
            ->join('danhmuc', 'sp.iddm', '=', 'danhmuc.id')
            ->select('sp.*', 'danhmuc.id as id_danhMuc', 'danhmuc.name as name_danhMuc');
        // dd($sql);
        $listSp = $sql->get();
        $top3 = DB::table('sanpham', 'sp')
            ->select('id', 'name', 'price')
            ->orderBy('luotxem', 'desc')->limit(3)
            ->get();
        return view('sanpham.list', compact('listSp', 'top3'));
    }
    public function detail($id)
    {
        // echo 'Chi tiết sản phẩm có ID: ' . $id;
        $detail = DB::table('sanpham', 'sp')
            ->where('id', '=', $id)
            ->first('*');
        if (empty($detail)) {
            echo 'Không tìm thấy bản ghi!';
        } else {
            return view('sanpham.detail', compact('detail'));
        }
    }
    public function edit($id)
    {
        $detail = DB::table('sanpham', 'sp')
            ->select('sp.*')
            ->where('id', '=', $id)
            ->first();
        return view('sanpham.edit', compact('detail'));
    }
    public function delete($id)
    {
        DB::table('sanpham', 'sp')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('san-pham.list');
    }
}