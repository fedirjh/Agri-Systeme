<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Component
{

    public $user;
    public $name,$editId,$deleteId;
    public $mode ;
    public $all_permissions,$permission_groups,$permissions = [];

    public function mount()
    {
        $this->mode = 'list';
        $this->user = Auth::guard('admin')->user();
        $this->all_permissions  = Permission::all();
        $this->permission_groups = User::getpermissionGroups();
    }

    public function render()
    {
        return view('livewire.role.index', [
            'roles' => Role::all(),
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->all_permissions  = Permission::all();
        $this->permission_groups = User::getpermissionGroups();
        $this->editId = '';
        $this->permissions = [];
    }

    public function store(){

        $this->validate([
            'name' => 'required|max:100|unique:roles'
        ]);

        $role = Role::create(['name' => $this->name, 'guard_name' => 'admin']);

        // $role = DB::table('roles')->where('name', $request->name)->first();
        /*$permissions = $request->input('permissions');*/

        if (!empty($this->permissions)) {
            $role->syncPermissions($this->permissions);
        }

        $this->mode = 'list';
        session()->flash('status','Role has been created !');
        $this->resetInputFields();
    }

    public function edit($id){

        $item = Role::findOrFail($id);
        $this->name = $item->name;
        $this->editId = $item->id;
        $this->permissions = $item->permissions->pluck('name')->toArray();
        $this->mode = 'edit';
    }

    public function delete(){
        //if($this->user->id != $this->deleteId) {
            $role = Role::find($this->deleteId);
            $role->syncPermissions();
            $role->delete();
            session()->flash('status', 'Role has been deleted !.');
        //}else{
            //session()->flash('error', 'You can not delete yourself !.');
        //}
    }


    public function update(){

        $role = Role::findById($this->editId, 'admin');

        $validatedData = $this->validate([
            'name' => 'required|max:100|unique:roles,name,'.$role->id,
        ]);

        $role->update($validatedData);

        if (!empty($this->permissions)) {
            $role->syncPermissions($this->permissions);
        }

        $this->mode = 'list';
        session()->flash('status','Role has been updated !');
        $this->resetInputFields();

        // return back()->withStatus('Agriculteur Created Successfully.');
    }

}
