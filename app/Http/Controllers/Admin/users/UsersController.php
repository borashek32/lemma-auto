<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/users')->with('success', 'Пользователь удален успешно');
    }
}
