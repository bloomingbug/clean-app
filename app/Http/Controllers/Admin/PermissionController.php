<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission.index')->only('index');
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $permissions = Permission::orderBy('name', 'asc')->get();

            return DataTables::of($permissions)
                ->addIndexColumn()
                ->make(true);
        } else {
            return view('pages.admin.permission.index');
        }
    }
}
