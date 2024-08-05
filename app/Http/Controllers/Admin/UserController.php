<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::latest();
            return DataTables::eloquent($users)
                ->addIndexColumn()
                ->addColumn('roles', function ($row) {
                    $roles = '';
                    foreach ($row->roles as $role) {
                        $roles .= $role->name . ', ';
                    }
                    return $roles;
                })
                ->addColumn('action', 'admin.user-management.user.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        $roles = Role::all();
        $compact = compact(
            'roles'
        );
        return view('admin.user-management.user.index', $compact);
    }

    public function store(UserRequest $request)
    {
        $user = User::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]
        );
        $user->syncRoles($request->roles);




        return response()->json([
            'success' => true,
            'message' => 'User saved successfully'
        ], 200);
    }

    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }
}
