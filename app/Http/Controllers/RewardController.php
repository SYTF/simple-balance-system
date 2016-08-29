<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Reward;

use DB;
use Cache;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rewardList = Reward::orderBy('recordDate', 'desc')->paginate(3);
        if($rewardList->count() > 0){
          $lastTransaction = Reward::orderBy('recordDate', 'desc')->first()->recordDate;

          $current_balance_tmp = Cache::remember('current_balance', 30, function(){
            return DB::select('SELECT SUM(`amount`) as `balance` FROM `rewardRecords`;');
          });

          $current_balance = $current_balance_tmp[0]->balance;
        }else{
          $lastTransaction = 'N/a';
          $current_balance = '0';
        }

        return View('rewards',
          [
            'rewardList' => $rewardList,
            'lastTransaction' => $lastTransaction,
            'currentBalance'  => $current_balance
          ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'itemDescription' => 'required',
        'amount' => 'required',
        'recordDate'  => 'required'
      ]);

      $input = $request->input();

      $amount = $input['amount'];
      if($input['recordType'] == 2) $amount = $amount * (-1);

      $rewardRecord = new Reward();
      $rewardRecord->amount = $amount;
      $rewardRecord->item = $input['itemDescription'];
      $rewardRecord->type = $input['recordType'];
      $rewardRecord->recordDate = $input['recordDate'];
      $rewardRecord->save();

      /*Clean Cache*/
      Cache::forget('current_balance');

      return redirect('rewards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
