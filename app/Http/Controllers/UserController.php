<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Data User',
            'menuAdminUser' => 'active',
            'user' => User::orderBy('jabatan', 'asc')->get(),
        );

        return view('admin/user/index', $data);
    }

    public function create(){
        $data = array(
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',
            'user' => User::get(),
        );

        return view('admin/user/create', $data);
    }
    
    public function store(Request $request)
{
    $request->validate([
        'nama' => ['required'],
        'email' => ['required', 'email', 'unique:users,email'],
        'jabatan' => ['required', Rule::in(['Admin', 'Karyawan'])],
        'password' => ['required', 'confirmed', 'min:8'],
    ], [
        'nama.required' => 'Nama harus di isi',
        'email.required' => 'Email harus di isi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah ada',
        'jabatan.required' => 'Jabatan harus di pilih',
        'jabatan.in' => 'Jabatan tidak valid',
        'password.required' => 'Password harus di isi',
        'password.confirmed' => 'Konfirmasi password tidak sama',
        'password.min' => 'Karakter minimal 8',
    ]);

    User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
        'password' => Hash::make($request->password),
        'is_tugas' => false,
    ]);

    return redirect()->route('user')->with('success', 'Berhasil menambahkan data');
}

    public function edit($id){
        $data = array(
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user' => User::findOrFail($id),
        );

        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'jabatan' => ['required', Rule::in(['Admin', 'Karyawan'])],
        'password' => 'nullable|confirmed|min:8',
    ], [
        'nama.required' => 'Nama harus di isi',
        'email.required' => 'Email harus di isi',
        'email.email' => 'Format email tidak valid',
        'email.unique' => 'Email sudah ada',
        'jabatan.required' => 'Jabatan harus di pilih',
        'jabatan.in' => 'Jabatan tidak valid',
        'password.confirmed' => 'Konfirmasi password tidak sama',
        'password.min' => 'Karakter minimal 8',
    ]);

    $user = User::with('tugas')->findOrFail($id);

    $data = [
        'nama' => $request->nama,
        'email' => $request->email,
        'jabatan' => $request->jabatan,
    ];

    // Kalau jabatannya diubah jadi Admin
    if ($request->jabatan === 'Admin') {
        $data['is_tugas'] = false;
        if ($user->tugas) {
            $user->tugas()->delete(); // hapus semua tugas
        }
    }

    // Hanya update password jika diisi
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('user')->with('success', 'Data berhasil diupdate');

}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y H.i.s');
        return Excel::download(new UserExport, 'DataUser_'.$filename.'.xlsx');
    }

    public function pdf()
    {
    $filename = now()->format('d-m-Y H.i.s');

    $data = [
        'user' => User::all(),
    ];

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin/user/pdf', $data)
        ->setPaper('A4', 'landscape'); 

    return $pdf->download('$user_' . $filename . '.pdf');
    }

}
