<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminController extends Component
{

    public $user;
    public $name, $email, $username, $password,$password_confirmation,$editId,$deleteId,$roles,$role;
    public $mode ;

    public function mount()
    {
        $this->mode = 'list';
        $this->roles  = Role::all();
        $this->user = Auth::guard('admin')->user();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'admins' => Admin::all(),
        ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->username = '';
        $this->password = '';
        $this->editId = '';
        $this->password_confirmation = '';
        $this->role = '';
    }


    /**
     * @throws ValidationException
     */
    public function store(){

        $validatedData = $this->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'username' => 'required|max:100|unique:admins',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $this->password = Hash::make($this->password);
        $admin = Admin::create($validatedData);
        if ($this->role) {
            $admin->assignRole($this->role);
        }
        $this->mode = 'list';
        session()->flash('status','Admin has been created !');
        $this->resetInputFields();

        // return back()->withStatus('Agriculteur Created Successfully.');
    }

    public function update(){

        $admin = Admin::find($this->editId);

        $validatedData = $this->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:100|unique:admins,username,'.$admin->id,
            'email' => 'required|max:100|email|unique:admins,email,'.$admin->id,

        ]);

        $admin->update($validatedData);

        if ($this->password) {
            $this->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ]);
            $this->password = Hash::make($this->password);
            $admin->update(['password' => Hash::make($this->password)]);
        }

        if ($this->role) {
            $admin->roles()->detach();
            $admin->assignRole($this->role);
        }
        $this->mode = 'list';
        session()->flash('status','Admin has been updated !');
        $this->resetInputFields();

        // return back()->withStatus('Agriculteur Created Successfully.');
    }


    public function edit($id){

        $item = Admin::findOrFail($id);
        $this->name = $item->name;
        $this->editId = $item->id;
        $this->username = $item->username;
        $this->email = $item->email;
        $this->password = '';
        $this->role = $item->roles->pluck('id');
        $this->mode = 'edit';
    }

    public function delete(){
        if($this->user->id != $this->deleteId) {
            $admin = Admin::find($this->deleteId);
            $admin->roles()->detach();
            $admin->delete();
            session()->flash('status', 'Admin has been deleted !.');
        }else{
            session()->flash('error', 'You can not delete yourself !.');
        }
    }


}
