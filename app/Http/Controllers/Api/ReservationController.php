<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ReservationResource;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /*
     * Return a pagination list of reservations.
     *
     * @return ReservationResource
     */
    public function index() {

        $reservations = Reservation::latest()->paginate(20);

        return ReservationResource::collection($reservations);
    }

    /*
     * Fetch and return the reservation.
     *
     * @param Reservation $reservation
     * @return ReservationResource
     */
    public function show(Reservation $reservation){
        return new ReservationResource($reservation);
    }

    /*
     * Validate and save a new reservation to the database.
     *
     * @param Request $request
     * @return ReservationResource
     */
    public function store(Request $request) {
        $reservation = $this->validate($request,[
            'name' => 'required|min:3|max:50',
            'email'=> 'required|email',
        ]);

        $reservation = Reservation::create($reservation);

        return new ReservationResource($reservation);
    }
}
