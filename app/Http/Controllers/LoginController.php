<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'max:100']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin()) {
                return redirect()->route('adminHome');
            }
            return redirect()->route('login')->with('khongDuQuyen', 'Bạn không đủ quyền!')->withInput($data);
        }

        return back()->withErrors([
            'message' => 'Thông tin đăng nhập không chính xác, vui lòng thử lại!'
        ])->withInput($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
