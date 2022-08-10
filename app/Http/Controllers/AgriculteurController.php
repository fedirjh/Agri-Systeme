<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Agriculteur;
use Illuminate\Http\Request;

class AgriculteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agriculteurs = Agriculteur::all();
        return view('agri.index',compact('agriculteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('agri.create');
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
            'nom_prenom'       => 'required|',
            'cin'              =>  'required' ,
            'tel'              =>  'required' ,
            'zone'             => 'required',
            'region'           => 'required|',

                     ]);
     $agriculteur               = new Agriculteur();
     $agriculteur->nom_prenom   = $request->input('nom_prenom');
     $agriculteur->cin          = $request->input('cin');
     $agriculteur->tel          = $request->input('tel');
     $agriculteur->zone         = $request->input('zone');
     $agriculteur->region       = $request->input('region');

     $agriculteur->save();
     return redirect()->route('agri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function show(Agriculteur $agriculteur)
    {
        return view('agri.show',compact('agriculteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Agriculteur $agriculteur,$id)
    {
        $agriculteur=Agriculteur::find($id);
        return view('agri.edit',compact('agriculteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agriculteur $agriculteur)
    {
        $request->validate ([
            'nom_prenom'       => 'required|',
            'cin'              =>  'required' ,
            'tel'              =>  'required' ,
            'zone'             => 'required',
            'region'           => 'required|',

                     ]);
     $agriculteur               = Agriculteur::find($id);
     $agriculteur->nom_prenom   = $request->input('nom_prenom');
     $agriculteur->cin          = $request->input('cin');
     $agriculteur->tel          = $request->input('tel');
     $agriculteur->zone         = $request->input('zone');
     $agriculteur->region       = $request->input('region');

     $agriculteur->save();
     return redirect()->route('agri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agriculteur  $agriculteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agriculteur $agriculteur)
    {
        $agriculteur = Agriculteur::find($id);
        $agriculteur->delete();
        toastr()->error('Data has been deleted successfully!');
                return redirect('/agri');
    }
    public function affect(){
        $agriculteurs = Agriculteur::where('responsable_id',null)->get();
        $agriculteursAff = Agriculteur::whereNotNull('responsable_id')->with('responsable')->get();
        $responsables = Responsable::all();
        //return $agriculteursAff;
        return view('agri.affecte',compact(['agriculteurs','agriculteursAff','responsables']));
    }

    public function nonAffect(){
        $agriculteurs = Agriculteur::where('responsable_id',null)->get();
        return view('agri.nonaffecte',compact(['agriculteurs']));
    }

    public function storeResponsable(Request $request)
    {

        $request->validate (['responsable_id'       => 'required','agriculteur_id'        =>  'required',        ]);

        $rid= $request->input('responsable_id');
        $aid= $request->input('agriculteur_id');

        $agriculteur = Agriculteur::find($aid);
        $agriculteur->responsable_id = $rid;
        $agriculteur->save();

         $resp = Responsable::find($rid);
         $resp->assignAgriculteur($agriculteur);

        toastr()->success('Bene affectée avec succes!');
        return redirect()->route('agri.agriAffect');
    }
}
