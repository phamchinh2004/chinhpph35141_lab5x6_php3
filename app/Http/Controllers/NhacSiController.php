<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\NhacSi;
use App\Models\AmNhac;
use Validator;

class NhacSiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //eloquent
        // $dataAll = NhacSi::all();
        //query builder
        $dataAll = DB::table("nhac_sis")->orderByDesc("nhac_sis.id")->get();
        return view("nhacSi.index", compact("dataAll"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Query builder
        $dataAmNhac = DB::table("am_nhacs", "an")->select('an.id', 'an.ten')->get();
        //Eloquent
        // $dataAmNhac = AmNhac::select('id', 'ten')->get();
        return view('nhacSi.create', compact('dataAmNhac'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputValidate = [
            'ten' => ['required', 'string', 'max:255'],
            'anh' => ['required'],
            'ngay_sinh' => ['required', 'date'],
            'que_quan' => ['required', 'string', 'max:255'],
            'songs' => ['required']
        ];
        $validator = Validator::make($request->all(), $inputValidate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inputData = $request->except('anh');
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $fileExtension = $request->anh->extension();
            $fileName = time() . '-nhacSi.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
        } else {
            $fileName = '';
        }
        $insertData = [
            'ten' => $inputData['ten'],
            'anh' => $fileName,
            'ngay_sinh' => $inputData['ngay_sinh'],
            'que_quan' => $inputData['que_quan'],
            'created_at' => Carbon::now()
        ];
        $nhacSiId = DB::table('nhac_sis')->insertGetId($insertData);
        foreach ($request->songs as $song) {
            DB::table('am_nhacs')->insert([
                'ten' => $song,
                'id_nhac_si' => $nhacSiId,
                'mo_ta' => "",
                'created_at' => Carbon::now()
            ]);
        }
        return redirect()->route('nhacSi.index')->with('success', 'Thêm mới nhạc sĩ thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dataNhacSi = DB::table("nhac_sis")->where("id", $id)->first();
        $dataAmNhac = DB::table("am_nhacs")->where("id_nhac_si", $id)->select('am_nhacs.ten')->get();
        return view("nhacSi.show", compact("dataNhacSi", "dataAmNhac"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Query builder
        $oldDataNhacSi = DB::table("nhac_sis", "ns")->where("ns.id", $id)->first();
        $dataAmNhac = DB::table("am_nhacs", "an")->select('an.id', 'an.ten')->get();
        //Eloquent
        // $dataAmNhac = AmNhac::select('id', 'ten')->get();
        return view('nhacSi.edit', compact('dataAmNhac', 'oldDataNhacSi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputValidate = [
            'ten' => ['required', 'string', 'max:255'],
            'que_quan' => ['required', 'string', 'max:255'],
        ];
        $validator = Validator::make($request->all(), $inputValidate);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inputData = $request->except('anh');
        if ($request->hasFile('anh')) {
            $file = $request->anh;
            $fileExtension = $request->anh->extension();
            $fileName = time() . '-nhacSi.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
        } else {
            $fileName = '';
        }
        if ($fileName == "" && $inputData['ngay_sinh'] == "") {
            $insertData = [
                'ten' => $inputData['ten'],
                'que_quan' => $inputData['que_quan'],
                'updated_at' => Carbon::now()
            ];
        } else if ($fileName == "" && $inputData['ngay_sinh'] != "") {
            $insertData = [
                'ten' => $inputData['ten'],
                'ngay_sinh' => $inputData['ngay_sinh'],
                'que_quan' => $inputData['que_quan'],
                'updated_at' => Carbon::now()
            ];
        } else if ($fileName != "" && $inputData["ngay_sinh"] != "") {
            $insertData = [
                'ten' => $inputData['ten'],
                'anh' => $fileName,
                'ngay_sinh' => $inputData['ngay_sinh'],
                'que_quan' => $inputData['que_quan'],
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('nhac_sis')->where('id', $id)->update($insertData);
        if ($request->songs != "") {
            foreach ($request->songs as $song) {
                DB::table('am_nhacs')->insert([
                    'ten' => $song,
                    'id_nhac_si' => $id,
                    'mo_ta' => "",
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return redirect()->route('nhacSi.index')->with('success', 'Cập nhật nhạc sĩ thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("nhac_sis")->delete($id);
        // return redirect()->route("nhacSi.index");
        return back();
    }
}
