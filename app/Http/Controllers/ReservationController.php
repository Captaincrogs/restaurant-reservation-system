<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Models\User;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //make a array of user and reservation
        [
            'reservations' => $reservations,
            'users' => $users,
        ] = [
            'reservations' => Reservation::with('user')->get(),
            'users' => User::all(),
        ];
    
        return view('reservations', compact('reservations', 'users'));
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
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {

        $reservations = Reservation::create([
            'id' => $request->id,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
            'user_id' => $request->user_id,
            'people' => $request->people,
            'status' => 'pending',

        ]);
        return redirect()->route('reservation');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->delete();
        return redirect()->route('reservation');


    }
}
