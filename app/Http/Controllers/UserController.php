<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Index', [
            'users' => User::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Create');
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
            'name' => 'required|min:3',
            'email' => 'required|min:8|unique:users',
            'password' => 'required|min:8'
        ]);
        
        if ($request->verified) {
            $request->merge([
                'email_verified_at' => now()
            ]);
        }
        
        $user = User::create(
            $request->all()
        );

        return redirect()
            ->route('users.show', $user->id)
            ->with('message', 'Successful, user added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('Show', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Edit', [
            'user' => User::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = [
            'name' => 'required|min:3',
            'email' => 'required|min:8|unique:users,id,' . $id,
        ];

        if ($request->isPassword) {
            $validate['password'] = 'required|min:8';
        }
        else {
            $request->replace($request->except('password'));
        }

        $request->validate($validate);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()
            ->route('users.show', $id)
            ->with('message', 'Successful, user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $message = $user
            ? 'Successful, user deleted successfully.'
            : 'Failed, the user has not been deleted.';

        return redirect()
            ->route('users.index')
            ->with('message', $message);
    }
}
