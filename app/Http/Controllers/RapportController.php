<?php

namespace App\Http\Controllers;

use App\Rapport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\DataTables\RapportsDataTable;
use Illuminate\Support\Facades\DB;


class RapportController extends Controller
{

    public function indexx(RapportsDataTable $dataTable)
{
    return $dataTable->render('donnees');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rapports = Rapport::all();
        return view ('rapport.index',compact('rapports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('rapport.create'); 
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
            'date_plantation'      => 'date',
            'nombre_plant'       => 'required',
            'rendement'       => 'required|',
                        ]);
          $rapport= new Rapport();
          $rapport->region = $request->input('region');
          $rapport->varite = $request->input('varite');
          $rapport->cycle = $request->input('cycle');
          $rapport->densite = $request->input('densite');
          $rapport->date_plantation= $request->input('date_plantation');
          $rapport->nombre_plant = $request->input('nombre_plant');
          $rapport->rendement = $request->input('rendement');
          $superficie = (int) $request->input('nombre_plant') / (int) $request->input('densite') ;
          $rapport->superficie = $superficie;
          $rapport->date_plantation= Carbon::now();
          $rapport->date_recolte = Carbon::now()->addDays($request->input('cycle'));
          $rapport->quantite = $superficie * (int) $request->input('rendement');
          $rapport->save();
            toastr()->success('Data has been created successfully!');

          return redirect()->route('rapport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rapport=rapport::find($id);
        return view('rapport.edit',compact('rapport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate ([
            'region'           => 'required|',
            'varite'       => 'required',
            'cycle'        =>  'required',
            'densite'         =>  'required|',
            'date_plantation'      => 'date',
            'nombre_plant'       => 'required',
            'rendement'       => 'required|',
                        ]);
          $rapport= Rapport::find($id);
          $rapport->region = $request->input('region');
          $rapport->varite = $request->input('varite');
          $rapport->cycle = $request->input('cycle');
          $rapport->densite = $request->input('densite');
          $rapport->date_plantation= $request->input('date_plantation');
          $rapport->nombre_plant = $request->input('nombre_plant');
          $rapport->rendement = $request->input('rendement');
          $superficie = (int) $request->input('nombre_plant') / (int) $request->input('densite') ;
          $rapport->superficie = $superficie;
          $rapport->date_plantation= Carbon::now();
          $rapport->date_recolte = Carbon::now()->addDays($request->input('cycle'));
          $rapport->quantite = $superficie * (int) $request->input('rendement');
          $rapport->save();
            toastr()->success('Data has been created successfully!');

          return redirect()->route('rapport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rapport  $rapport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rapport = Rapport::find($id);
        $rapport->delete();
        toastr()->error('Data has been deleted successfully!');
                return redirect('/rapport');
    }
//     public function deleteAll(Request $request)
// {
//     $ids = $request->ids;
//     DB::table("calculs")->whereIn('id',explode(",",$ids))->delete();
//     return response()->json(['success'=>"Projections Deleted successfully."]);
// }
}
