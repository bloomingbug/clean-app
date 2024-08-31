<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role.index')->only(['index']);
        $this->middleware('permission:role.add')->only(['create', 'store']);
        $this->middleware('permission:role.edit')->only(['edit', 'update']);
        $this->middleware('permission:role.delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $roles = Role::query()
                ->with('permissions')
                ->orderBy('name')
                ->get();

            return DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('permissions', function (Role $role) {
                    return $role->permissions->map(function ($permission) {
                        return $permission->name;
                    })->implode(', ');
                })
                ->addColumn('action', function (Role $role) {
                    return view('pages.admin.role.button.crud', compact('role'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Hapus Role!';
        $text = "Apakah anda yakin ingin menghapus role ini?";
        confirmDelete($title, $text);
        return view('pages.admin.role.index');
    }

    public function create()
    {

        $permissions = Permission::orderBy('name')->get();
        return view('pages.admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'string', 'exists:permissions,name'],
        ]);

        try {
            DB::beginTransaction();
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            $role->syncPermissions($request->permissions);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error($e->getCode() . ' Role gagal ditambahkan');
            return redirect()->route('admin.role.index')->with('error', $e->getCode() . ' Role gagal ditambahkan');
        }


        flash()->success('Role berhasil ditambahkan');
        return redirect()->route('admin.role.index')->with('success', 'Role berhasil ditambahkan');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name')->get();
        return view('pages.admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['required', 'string', 'exists:permissions,name'],
        ]);

        try {
            DB::beginTransaction();
            $role->update([
                'name' => $request->name,
                'guard_name' => 'web',
            ]);

            $role->syncPermissions($request->permissions);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error($e->getCode() . ' Role gagal diedit');
            return redirect()->route('admin.role.index')->with('error', $e->getCode() . ' Role gagal diedit');
        }

        flash()->success('Role berhasil diedit');
        return redirect()->route('admin.role.index')->with('success', 'Role berhasil diedit');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        flash()->success('Role berhasil dihapus');
        return redirect()->route('admin.role.index')->with('success', 'Role berhasil dihapus');
    }
}
