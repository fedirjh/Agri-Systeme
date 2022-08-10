<?php

namespace App\Http\Controllers;

use App\Calcul;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\DataTables\CalculsDataTable;
use Illuminate\Support\Facades\DB;
class CalculController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexx(CalculsDataTable $dataTable)
    {
        return $dataTable->render('donnees');
    }
    public function index()
    {
        $users=User::all();
        $calculs = Calcul::all();
        return view ('calcul.index',compact('calculs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('calcul.create'); 
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
            'region'           => 'required|',
            'varite'       => 'required',
            'cycle'        =>  'required',
            'densite'         =>  'required|',
            'datep'      => 'date',
            'nbrp'       => 'required',
            'rdm'       => 'required|',
                        ]);
          $calcul= new Calcul();
          $calcul->region = $request->input('region');
          $calcul->varite = $request->input('varite');
          $calcul->cycle = $request->input('cycle');
          $calcul->densite = $request->input('densite');
          $calcul->datep = $request->input('datep');
          $calcul->nbrp = $request->input('nbrp');
          $calcul->rdm = $request->input('rdm');
          $superficie = (int) $request->input('nbrp') / (int) $request->input('densite') ;
          $calcul->superficie = $superficie;
          $calcul->datep= Carbon::now();
          $calcul->dater = Carbon::now()->addDays($request->input('cycle'));
          $calcul->quantite = $superficie * (int) $request->input('rdm');
          $calcul->save();
            toastr()->success('Data has been created successfully!');

          return redirect()->route('calcul.index');
                    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calcul  $calcul
     * @return \Illuminate\Http\Response
     */
     public function show(Calcul $calcul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calcul  $calcul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calcul=Calcul::find($id);
       // DB::table('transporteurs')->where('status', 0)->update(['status' => 1]);
        return view('calcul.edit',compact('calcul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calcul  $calcul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'region'           => 'required|',
            'varite'       => 'required',
            'cycle'        =>  'required',
            'densite'         =>  'required|',
            'datep'      => 'required|date|',
            'nbrp'       => 'required',
            'rdm'       => 'required|',
                        ]);
          $calcul= Calcul::find($id);
          $calcul->region = $request->input('region');
          $calcul->varite = $request->input('varite');
          $calcul->cycle = $request->input('cycle');
          $calcul->densite = $request->input('densite');
          $calcul->datep = $request->input('datep');
          $calcul->nbrp = $request->input('nbrp');
          $calcul->rdm = $request->input('rdm');
          $superficie = (int) $request->input('nbrp') / (int) $request->input('densite') ;
          $calcul->superficie = $superficie;
          $calcul->datep= Carbon::now();
          $calcul->dater = Carbon::now()->addDays($request->input('cycle'));
          $calcul->quantite = $superficie * (int) $request->input('rdm');
          $calcul->save();
          toastr()->info('Data has been updated successfully!');
          return redirect()->route('calcul.index');
                    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calcul  $calcul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calcul = Calcul::find($id);
        $calcul->delete();
        toastr()->error('Data has been deleted successfully!');
                return redirect('/calcul');
    }
    public function deleteAll(Request $request)
{
    $ids = $request->ids;
    DB::table("calculs")->whereIn('id',explode(",",$ids))->delete();
    return response()->json(['success'=>"Projections Deleted successfully."]);
}
}
