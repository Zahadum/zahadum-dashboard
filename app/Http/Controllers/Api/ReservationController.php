<?php

namespace App\Http\Controllers\Api;

use App\ContactForm;
use App\Http\Controllers\EmailController;
use App\Http\Resources\ContactFormResource;
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
            'name' => 'nullable',
            'email'=> 'required|email',
            'phone' => 'nullable',
            'people' => 'nullable',
            'datetime' => 'required|date_format:Y-m-d H:i:s',
            'note' => 'nullable',
            'key' => 'required',
        ]);
        if($reservation["key"]=='123') {
            $reservation = Reservation::create($reservation);
            $reservationResource = new ReservationResource($reservation);
            $mailData['name'] = $reservationResource['name'];
            $mailData['email'] = $reservationResource['email'];
            $mailData['phone'] = $reservationResource['phone'];
            $mailData['people'] = $reservationResource['people'];
            $mailData['datetime'] = $reservationResource['datetime'];
            $mailData['date'] = $reservationResource['date']['date'];
            $mailData['note'] = $reservationResource['note'];
            EmailController::sendNotification($mailData);
            return $reservationResource;
        }
        return ['status'=>'failed'];
    }
    public function sendContact(Request $request) {
        $contact = $this->validate($request,[
            'name' => 'nullable',
            'email'=> 'required|email',
            'phone' => 'nullable',
            'subject' => 'nullable',
            'note' => 'nullable',
            'key' => 'required',
        ]);
        if($contact["key"]=='123') {
            $contact = ContactForm::create($contact);
            $contactResource = new ContactFormResource($contact);
            $mailData['name'] = $contactResource['name'];
            $mailData['email'] = $contactResource['email'];
            $mailData['phone'] = $contactResource['phone'];
            $mailData['subject'] = $contactResource['subject'];
            $mailData['note'] = $contactResource['note'];
            EmailController::sendNotificationContact($mailData);
            return $contactResource;
        }
        return ['status'=>'failed'];
    }
    public function andolaSendContact(Request $request) {
        $contact = $this->validate($request,[
            'name' => 'nullable',
            'email'=> 'required|email',
            'note' => 'required',
            'key' => 'required',
        ]);
        if($contact["key"]=='123') {
            $contact = ContactForm::create($contact);
            $contactResource = new ContactFormResource($contact);
            $mailData['name'] = $contactResource['name'];
            $mailData['email'] = $contactResource['email'];
            $mailData['note'] = $contactResource['note'];
            EmailController::andolaSendNotificationContact($mailData);
            return $contactResource;
        }
        return ['status'=>'failed'];
    }
    public function vinacastudySendContact(Request $request) {
        $contact = $this->validate($request,[
            'name' => 'nullable',
            'email'=> 'required|email',
            'note' => 'required',
            'key' => 'required',
        ]);
        if($contact["key"]=='123') {
            $contact = ContactForm::create($contact);
            $contactResource = new ContactFormResource($contact);
            $mailData['name'] = $contactResource['name'];
            $mailData['email'] = $contactResource['email'];
            $mailData['note'] = $contactResource['note'];
            EmailController::vinacastudySendNotificationContact($mailData);
            return $contactResource;
        }
        return ['status'=>'failed'];
    }
}
