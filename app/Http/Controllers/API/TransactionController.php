<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ParkTransaction;
use App\Transporteur;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $transactions = ParkTransaction::with('transporteur')->get();
        return response()->json($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'card_id' => 'required|max:100',
        ]);

        // get card ides from transporteur model and check if it exists
        $card_id = $request->input('card_id');
        $card = Transporteur::where('card_id', $card_id)->first();
        if (empty($card)) {
            return response()->json(['error' => 'Card not found'], 404);
        }

        // check if transaction exists with same card_id and get status
        $told = ParkTransaction::where('card_id', $card_id)->latest()->first();

        if($told){
            if($told->status == 'In'){
                $told->status = "Out";
                $told->exit_time = now();
                $told->save();
                return response()->json([
                    'message' => 'Transaction updated successfully',
                    'transaction' => $told
                ]);
            }
        }

        // save new transaction
        $transaction = ParkTransaction::create(
            [
                'card_id' => $card_id,
                'status' => 'In',
                'entry_time' => now(),
            ]
        );

        return response()->json($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParkTransaction  $parkTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ParkTransaction $parkTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParkTransaction  $parkTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkTransaction $parkTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParkTransaction  $parkTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkTransaction $parkTransaction)
    {
        //
    }
}
