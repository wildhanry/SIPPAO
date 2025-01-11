<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype == 'admin') {
            $datas = Data::orderBy('id', 'desc')->get();
        } else {
            $datas = Data::orderBy('id', 'desc')->get();
        }
        $total = Data::count();
        return view('admin.data.home', compact(['datas', 'total']));
    }

    public function create()
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }
        return view('admin.data.create');
    }

    public function save(Request $request)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $validation = $request->validate([
            'kategori' => 'required',
            'uraian' => 'required',
            'nominal' => 'required',
        ]);
        $data = Data::create($validation);
        if ($data) {
            session()->flash('success', 'Data Add Successfully');
            return redirect(route('admin/datas'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.datas/create'));
        }
    }
    public function edit($id)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $datas = Data::findOrFail($id);
        return view('admin.data.update', compact('datas'));
    }

    public function delete($id)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $datas = Data::findOrFail($id)->delete();
        if ($datas) {
            session()->flash('success', 'Data Deleted Successfully');
            return redirect(route('admin/datas'));
        } else {
            session()->flash('error', 'Data Not Delete successfully');
            return redirect(route('admin/datas'));
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $datas = Data::findOrFail($id);
        $kategori = $request->kategori;
        $uraian = $request->uraian;
        $nominal = $request->nominal;

        $datas->kategori = $kategori;
        $datas->uraian = $uraian;
        $datas->nominal = $nominal;
        $data = $datas->save();
        if ($data) {
            session()->flash('success', 'Data Update Successfully');
            return redirect(route('admin/datas'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/datas/update'));
        }
    }

    public function listUsers()
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $users = User::orderBy('id', 'desc')->get(); // Pastikan Anda sudah mengimpor model `User`
        return view('admin.user.list', compact('users'));
    }

    public function editUser($id)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User tidak ditemukan.');
        }

        return view('admin.user.edit', compact('user'));
    }


    public function deleteUser($id)
    {
        if (Auth::user()->usertype != 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak!');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'User tidak ditemukan.');
        }

        $user->delete();

        session()->flash('success', 'User deleted successfully');
        return redirect()->route('admin.users');
    }

    public function updateUser(Request $request, $id)
    {

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'usertype' => 'required|in:admin,user', // Pastikan usertype valid
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update user dengan data yang valid
        $user->update($validatedData);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
}
