<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class User41Controller extends Controller
{
    public function myprofile()
    {
        $agama = Http::get('http://localhost:8000/api/agama41')['data'];
        return view('user.myprofile', [
            'agamas' => $agama
        ]);
    }

    public function editimage(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->foto = $request->foto;

        if ($request->hasFile('foto')) {
            $foto_name = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
        }

        Http::put('http://localhost:8000/api/user41/update/image/' . $id, [
            'foto' => $foto_name
        ]);

        return redirect('/myprofile41');
    }

    public function editpassword(Request $request, $id)
    {
        Http::put('http://localhost:8000/api/user41/update/password/' . $id, [
            'password' => $request->password
        ]);

        return redirect('/myprofile41');
    }

    public function index()
    {
        $user = Http::get('http://localhost:8000/api/user41')['data'];
        return view('user.user', [
            'users' => $user,
            'no' => 1,
            'page' => "List user"
        ]);
    }

    public function show($id)
    {
        $user = Http::get('http://localhost:8000/api/user41/' . $id)['data'];

        return view('user.userdetail', [
            'user' => $user,
            'page' => "Detail user"
        ]);
    }

    public function destroy($id)
    {
        Http::delete('http://localhost:8000/api/user41/' . $id);
        return redirect('/user41');
    }

    public function update($id)
    {
        Http::put('http://localhost:8000/api/user41/' . $id);
        return redirect('/user41');
    }
}
