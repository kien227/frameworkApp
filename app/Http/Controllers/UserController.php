<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index1()
    {
        $users = User::oldest()->paginate(7);

        return view('teacher.index', compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index2()
    {
        $users = User::oldest()->paginate(7);

        return view('student.index', compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'username' => 'required',

            'role' => 'required',

        ]);
        if ($request['role'] == "teacher")
            User::create([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
                'fullname' => $request['fullname'],
                'email' => $request['email'],
                'phonenumber' => $request['phonenumber'],
                'role' => 'teacher',
            ]);
        else
            User::create([
                'username' => $request['username'],
                'password' => Hash::make($request['password']),
                'fullname' => $request['fullname'],
                'email' => $request['email'],
                'phonenumber' => $request['phonenumber'],
                'role' => 'student',
            ]);
        return redirect()->route('users.index1')

            ->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
            return view('teacher.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit1($id)
    {
        $user = User::find($id);
        return view('teacher.edit', compact('user'));
    }

    public function edit2($id)
    {
        $user = User::find($id);
        return view('student.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        $user = $request->all();
        $user['password'] = bcrypt($user['password']);
        User::find($id)->update($user);

        return redirect()->route('users.index1')

            ->with('success', 'User updated successfully');
    }

    public function update2(Request $request, $id)
    {

        $user = $request->all();
        $user['password'] = bcrypt($user['password']);
        User::find($id)->update($user);

        return redirect()->route('users.index2')

            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();



        return redirect()->route('users.index1')

            ->with('success', 'User deleted successfully');
    }
}
