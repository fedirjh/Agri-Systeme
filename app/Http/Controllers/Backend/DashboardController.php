<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\َAgriculteur;
use App\Models\Responsable;
use App\Benne;
use App\Rapport;
use App\Transporteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
      $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $total_roles = count(Role::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        $total_bennes = count(Benne::select('id')->get());
        $total_transporteurs = count(Transporteur::select('id')->get());
        $total_rapports = count(Rapport::select('id')->get());
        // $total_agriculteurs = count(Agriculteur::select('id')->get());
        // $total_responsables = count(Responsable::select('id')->get());

        return view('backend.pages.dashboard.index', compact('total_admins', 'total_roles', 'total_permissions', 'total_bennes','total_transporteurs','total_rapports'));
    }
}
