<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function indexUser()
    {
        if (Auth::check()) {
            // Mengambil semua pengguna
            $users = new User();
            
            // Jika pengguna adalah admin, maka filter hanya data pengguna tersebut
            if (Auth::user()->is_admin == 'n') {
                $users = $users->where('user_id', Auth::user()->user_id);
            }
    
            // Mengambil data pengguna setelah filtering
            $user = $users->get();
    
            return view('users.show_user', compact('user'));
        } else {
            return view('auth.login');
        }
    }

    public function getDetailUser($id)
    {
        if (Auth::check()) {
            $user = User::where('user_id', $id)->first();
    
            return view('users.detail_user', compact('user'));
        } else {
            return view('auth.login');
        }
    }

public function editUser($id)
{
    if (Auth::check()) {
        $user = User::where('user_id', $id)->first();

        return view('users.edit_user', compact('user'));
    } else {
        return view('auth.login');
    }
}

public function update(Request $request, $id)
{
    try{
        // Validasi data yang dikirimkan melalui $request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            // Tambahkan validasi untuk kolom lainnya jika diperlukan
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return redirect('users/show_user')->with('success', 'User updated successfully.');
    }catch (\Exception $e){
        return redirect()->back()->with('error', $e->getMessage());
    }
}


public function destroyuser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('users/show_user')->with('success', 'User deleted successfully.');
}
}
