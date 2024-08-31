<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user.index')->only('index');
        $this->middleware('permission:user.create')->only('create', 'store');
        $this->middleware('permission:user.edit')->only('edit', 'update');
        $this->middleware('permission:user.delete')->only('destroy');
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $users = User::with('roles')
                ->whereHas('roles', function ($query) {
                    $query->where('name', '!=', 'Super Admin');
                })
                ->when(auth()->user()->hasRole('Admin'), function ($query) {
                    return $query->whereHas('roles', function ($query) {
                        $query->where('name', '!=', 'Admin');
                    });
                })
                ->orderBy('name')
                ->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('roles', function (User $user) {
                    return $user->roles->map(function ($permission) {
                        return $permission->name;
                    })->implode(', ');
                })
                ->addColumn('action', function (User $user) {
                    return view('pages.admin.user.button.crud', compact('user'));
                })
                ->rawColumns(['action', 'roles'])
                ->make(true);
        }

        $title = 'Hapus User!';
        $text = "Apakah anda yakin ingin menghapus user ini?";
        confirmDelete($title, $text);
        return view('pages.admin.user.index');
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('pages.admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',  'alpha_dash', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);

        flash()->success('User berhasil ditambahkan!');
        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('pages.admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',  'alpha_dash', 'unique:users,username,' . $user->id,],
            'role' => ['required', 'exists:roles,name'],
        ]);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        $user->syncRoles($request->role);

        flash()->success('User berhasil diubah!');
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        flash()->success('User berhasil dihapus!');
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
    }
}
