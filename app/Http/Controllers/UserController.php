<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUsers = User::orderByDesc('users.id')->get();
        return view('users.index', compact('listUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataInput = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'type' => ['required'],
            'dob' => ['required', 'date'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:100'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'password' => ['required', 'string', 'max:100']
        ]);
        $checkUser = User::where('name', $dataInput['name'])->orWhere('email', $dataInput['email'])->orWhere('phone', $dataInput['phone'])->first();
        if ($checkUser) {
            return back()->withErrors(['error' => 'Người dùng đã tồn tại!'])->withInput();
        }
        try {
            $file = $dataInput['image'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . '-' . Str::random(10) . '.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
            $dataInsert = [
                'name' => $dataInput['name'],
                'email' => $dataInput['email'],
                'type' => $dataInput['type'],
                'dob' => $dataInput['dob'],
                'phone' => $dataInput['phone'],
                'address' => $dataInput['address'],
                'image' => $fileName,
                'password' => Hash::make($dataInput['password']),
                'created_at' => Carbon::now()
            ];
            User::insert($dataInsert);
            return redirect()->route('adminHome')->with(['message', 'Thêm mới user thành công!']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra trong quá trình thêm mới user!'])->withInput();
        }
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
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataInput = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'type' => ['required'],
            'dob' => ['nullable', 'date'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:100'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'password' => ['nullable', 'string', 'max:100']
        ]);
        $user = User::find($id);
        if (!$user->name == $dataInput['name']) {
            $checkName = User::where('name', $dataInput['name'])->first();
            if ($checkName) {
                return redirect()->route('userEdit', $id)->with('error', 'Tên đăng nhập đã tồn tại');
            }
        }
        if (!$user->email == $dataInput['email']) {
            $checkName = User::where('email', $dataInput['email'])->first();
            if ($checkName) {
                return redirect()->route('userEdit', $id)->with('error', 'Email đã tồn tại');
            }
        }
        if (!$user->phone == $dataInput['phone']) {
            $checkName = User::where('phone', $dataInput['phone'])->first();
            if ($checkName) {
                return redirect()->route('userEdit', $id)->with('error', 'Số điện thoại đã tồn tại');
            }
        }
        if ($dataInput['password']) {
            if ($request->oldPassword) {
                if (!Hash::check($request->oldPassword, $user->password)) {
                    return redirect()->route('userEdit', $id)->with('error', 'Mật khẩu cũ không khớp!');
                }
                $dataInput['password'] = Hash::make($dataInput['password']);
            } else {
                return redirect()->route('userEdit', $id)->with('error', 'Cần nhập mật khẩu cũ');
            }
        } else {
            unset($dataInput['password']);
        }
        if (!$dataInput['dob']) {
            unset($dataInput['dob']);
        }
        if ($request->hasFile('image')) {
            $file = $dataInput['image'];
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time() . '-' . Str::random(10) . '.' . $fileExtension;
            $file->move(public_path('uploads'), $fileName);
            if ($user->image) {
                $existingImage = public_path('uploads') . '/' . $user->image;
                if (file_exists($existingImage)) {
                    unlink($existingImage);
                }
            }
            $dataInput['image'] = $fileName;
        } else {
            unset($dataInput['image']);
        }
        try {
            $dataInput['updated_at'] = Carbon::now();
            $user->update($dataInput);
            return redirect()->route('adminHome')->with('message', 'Cập nhật user thành công!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Có lỗi xảy ra trong quá trình thêm mới user!'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $existingImage = public_path('uploads') . '/' . $user->image;
            if (file_exists($existingImage)) {
                unlink($existingImage);
            }
            $user->delete();
            return back()->with('message', 'Xóa thành công user!');
        } else {
            return back()->withErrors('error', 'User không tồn tại!');
        }
    }
}
