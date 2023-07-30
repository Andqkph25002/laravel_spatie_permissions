<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }
    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }
    public function StorePermission(Request $request)
    {

        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);
        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }
    public function UpdatePermission(Request $request)
    {
        $permission = Permission::findOrFail($request->id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);
        $notification = array(
            'message' => 'Permission Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function DeletePermission($id)
    {
        Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }
    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    }

    public function Export()
    {
        return Excel::download(new PermissionExport, 'permissions.xlsx');
    }

    public function Import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Import Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRoles()
    {
        return view('backend.pages.roles.add_roles');
    }
    public function StoreRoles(Request $request)
    {
        $roles = Role::create([
            'name' => $request->name,

        ]);
        $notification = array(
            'message' => 'Role Create Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    public function EditRoles($id)
    {
        $roles = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    }
    public function UpdateRoles(Request $request)
    {
        $roles = Role::findOrFail($request->id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);
        $notification = array(
            'message' => 'Role Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }
    public function DeleteRoles($id)
    {
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission', compact('roles', 'permission', 'permission_groups'));
    }
    public function StoreRolesPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function AllRolesPermission()
    {
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));
    }

    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission', compact('role', 'permission', 'permission_groups'));
    }

    public function AdminUpdateRoles(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }
    public function AdminDeleteRoles($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }
        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
