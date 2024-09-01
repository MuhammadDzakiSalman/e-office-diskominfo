<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::all();

    //     return view('users', compact('users'));
    // }
    public function index(Request $request)
{
    $users = User::query();

    // Filtering based on search query
    if ($request->has('search') && !empty($request->search)) {
        $users->where('nama_lengkap', 'like', '%' . $request->search . '%');
    }

    // Paginate the results
    $users = $users->paginate($request->input('show', 10));

    return view('users', compact('users'));
}
    public function create(Request $request){

        $create_user = new User();
        $create_user->username = $request->input('username');
        $create_user->nama_lengkap = $request->input('nama_lengkap');
        $create_user->password = $request->input('password');
        $create_user->level = $request->input('level');
        $create_user->bio = $request->input('bio');

        $create_user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat!');
    }

    public function editProfile($id)
    {
        $profile = User::findOrFail($id);

        return view('edit_profile', compact('profile'));
    }

    public function updateprofile(Request $request, $id)
    {
        $profile = User::findOrFail($id);

        $profile->update($request->all());

        return redirect()->route('profile.index')->with('success', 'User berhasil diperbarui!');
    }
    public function editPassword($id)
    {
        $password = User::findOrFail($id);

        return view('edit_password', compact('password'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah!');
    }

    public function editUser($id)
    {
        $users = User::findOrFail($id);

        return view('edit_users', compact('users'));
    }

    public function updateUser(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $users->update($request->all());

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
