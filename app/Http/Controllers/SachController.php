<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;
use App\Models\Sach;
use Illuminate\Support\Facades\Facade;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAll = DB::table("saches")->orderByDesc("saches.id")->get();
        return view("sach.index", compact("dataAll"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("sach.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputValidate = [
            'ten' => ['required', 'string', 'max:255'],
            'anh' => ['required'],
            'ngay_xuat_ban' => ['required', 'date'],
            'tac_gia' => ['required', 'string', 'max:255'],
            'so_luong' => ['required', 'integer', 'max:1000000']
        ];
        $validator = Validator::make($request->all(), $inputValidate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inputData = $request->except('anh');
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $fileExtension = $request->anh->extension();
            $fileName = time() . '-sach.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
        } else {
            $fileName = '';
        }
        $insertData = [
            'ten' => $inputData['ten'],
            'anh' => $fileName,
            'ngay_xuat_ban' => $inputData['ngay_xuat_ban'],
            'tac_gia' => $inputData['tac_gia'],
            'so_luong' => $inputData['so_luong'],
            'created_at' => Carbon::now()
        ];
        DB::table('saches')->insert($insertData);
        return redirect()->route('sach.index')->with('success', 'Thêm mới sách thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $value = DB::table("saches")->where("id", $id)->first();
        return view("sach.show", compact("value"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $oldDataSach = DB::table("saches")->where("saches.id", $id)->first();
        return view('sach.edit', compact('oldDataSach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputValidate = [
            'ten' => ['required', 'string', 'max:255'],
            'anh' => ['required'],
            'ngay_xuat_ban' => ['required', 'date'],
            'tac_gia' => ['required', 'string', 'max:255'],
            'so_luong' => ['required', 'integer', 'max:1000000']
        ];
        $validator = Validator::make($request->all(), $inputValidate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inputData = $request->except('anh');
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $fileExtension = $request->anh->extension();
            $fileName = time() . '-sach.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
        } else {
            $fileName = '';
        }
        $insertData = [
            'ten' => $inputData['ten'],
            'anh' => $fileName,
            'ngay_xuat_ban' => $inputData['ngay_xuat_ban'],
            'tac_gia' => $inputData['tac_gia'],
            'so_luong' => $inputData['so_luong'],
            'created_at' => Carbon::now()
        ];
        DB::table('saches')->where('id', $id)->update($insertData);
        return redirect()->route('sach.index')->with('success', 'Thêm mới sách thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('saches')->where('id', $id)->delete();
        return redirect()->back();
    }
}
