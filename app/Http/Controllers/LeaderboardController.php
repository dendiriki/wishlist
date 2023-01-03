<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use App\Models\User;
use App\Http\Requests\StoreLeaderboardRequest;
use App\Http\Requests\UpdateLeaderboardRequest;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Leaderboard $leaderboard)
    {   
         
        return view('jurnalis.leaderboard', [
          
            'leaderboard' => $leaderboard->orderBy('rank','DESC')->get(),
          
        //   'user_id' => $leaderboard->user_id,
        //   'rank' => $leaderboard->rank,
        //   'badge' => $leaderboard->badge
          
        ]);

    
    }


    /**
 
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
     * @param  \App\Http\Requests\StoreLeaderboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaderboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaderboard  $leaderboard
     * @return \Illuminate\Http\Response
     */
    public function show(Leaderboard $leaderboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leaderboard  $leaderboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Leaderboard $leaderboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaderboardRequest  $request
     * @param  \App\Models\Leaderboard  $leaderboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaderboardRequest $request, Leaderboard $leaderboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaderboard  $leaderboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leaderboard $leaderboard)
    {
        //
    }
}
