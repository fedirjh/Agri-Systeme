<?php

namespace App\Http\Controllers;

use App\Transporteur;
use App\User;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\DataTables\TransporteursDataTable;

class TransporteurController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //    $this->middleware('auth');
    // }

    public function indexx(TransporteursDataTable $dataTable)
    {
        return $dataTable->render('indexx');
    }
   public function index(   Request $request)
   {
    if (is_null($this->user) || !$this->user->can('role.edit')) {
        abort(403, 'Sorry !! You are Unauthorized to edit any role !');
    }

         $transporteurs = Transporteur::with('bennes')->where ([
            ['nom','!=', Null],
            [function ($query)use ($request){
                if (($term =$request ->term)) {
                    $query ->orwhere('nom','LIKE','%' .$term . '%')->get();
                }
            }]
        ])
        
        ->orderBy("id","asc")
        ->paginate(10);
        return view('trans.index',compact('transporteurs'))
        ->with('i', (request()->input('page',1)-1)*5);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('trans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate ([
            'nom'            =>       'required|',
            'tel'            =>        'required|min:8|max:10',
            'cin'            =>        'required',
            'zone'           =>        'required|',
            'matricule'      =>        'required|',
            'type'           =>        'required|',
            'garntie'        =>        'required|',
            'montant'        =>        'required|',
            'rq'             =>        'required|',
        ]);
                     
                     $transporteur          = new Transporteur();
     $transporteur->nom                     = $request->input('nom');
     $transporteur->tel                     = $request->input('tel');
     $transporteur->cin                     = $request->input('cin');
     $transporteur->mat                     = $request->input('mat');
     $transporteur->zone                    = $request->input('zone');
     $transporteur->matricule               = $request->input('matricule');
     $transporteur->type                    = $request->input('type');
     $transporteur->garntie                 = $request->input('garntie');
     $transporteur->montant                 = $request->input('montant');
     $transporteur->rq                      = $request->input('rq');
     //$transporteur->contrat   = $request->input('contrat');
     $transporteur->save();
     session()->flash('success', 'Transporteurs has been created !!');
     return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function afficher (Transporteur $transporteur)
    {
        $transporteur = Transporteur::with('bennes')->first();
        return view('trans.show',compact('transporteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function edit( Transporteur $transporteur,$id)
    {
        $transporteur=Transporteur::find($id);
       // DB::table('transporteurs')->where('status', 0)->update(['status' => 1]);
        return view('trans.edit',compact('transporteur'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'nom'            => 'required|',
            'tel'            => 'required|min:8|max:10',
            'cin'            =>  'required',
            'zone'           =>  'required|',
            'matricule'      => 'required|',
            'type'           => 'required|',
            'garntie'        => 'required|',
            'montant'        => 'required|',
            'rq'             => 'required|',
                     ]);
     $transporteur                          =Transporteur::find($id);
     $transporteur->nom                     = $request->input('nom');
     $transporteur->tel                     = $request->input('tel');
     $transporteur->cin                     = $request->input('cin');
     $transporteur->mat                     = $request->input('mat');
     $transporteur->zone                    = $request->input('zone');
     $transporteur->matricule               = $request->input('matricule');
     $transporteur->type                    = $request->input('type');
     $transporteur->garntie                 = $request->input('garntie');
     $transporteur->montant                 = $request->input('montant');
     $transporteur->rq                      = $request->input('rq');
     $transporteur->contrat                 = $request->input('contrat');
     $transporteur->status                  = $request->input('status');
     $transporteur->save();
    // $transporteur->save();
    toastr()->warning('transporteur modifier avec succes!');
     return redirect()->route('trans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transporteur  $transporteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporteur = Transporteur::find($id);
        $transporteur->delete();
        toastr()->error('Data has been deleted successfully!');
                return redirect('/trans');
    }

public function deleteAll(Request $request)
{
    $ids = $request->ids;
    DB::table("transporteurs")->whereIn('id',explode(",",$ids))->delete();
    return response()->json(['success'=>"transporteurs Deleted successfully."]);
}
}
