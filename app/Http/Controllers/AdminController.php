<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.index', ['users' => $users ]);
    }

    /**
     * @param $id
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        User::destroy($id);
        return redirect(route('admin'));
    }

    /**
     * show single user
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        return view('admin.user',['user'=>$user]);
    }

    /**
     * edit or create user
     * @param Requests\UserModelRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Requests\UserModelRequest $request,$id) {
        User::set($request->all(), $id);
        return redirect(route('admin'));
    }
}
