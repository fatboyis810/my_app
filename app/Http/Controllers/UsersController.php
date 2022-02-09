<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //表示用
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    //作成ページ表示用
    public function create()
    {
        return view('user.create');
    }

    //編集ページ表示用
    public function edit(User $user)
    {
        $genders = Config::get('my_app.genders');

        return view('user.edit', compact('user','genders'));
    }

    //新規作成
    public function store(UserRequest $request)
    {
        $user = (new User())->fill($request->except('password'));
        $user->password = Hash::make($request->get('password'));

        if (!$user->save()){

            return back()
                ->withErrors(['新規作成に失敗しました。'])
                ->withInput();
        }

        return redirect('/user');
    }

    //更新用
    public function update()
    {

    }
}
