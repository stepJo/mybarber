<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Treatment;
use App\Reservation;
use App\ReservationHeader;
use App\ReservationMode;
use App\ReservationMessage;
use App\Mail\ConfirmMail;
use App\Mail\FailMail;
use Mail;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function count()
    {
        $data = Reservation::getReservation(0);

        $total = count($data);

        $time = 1;

        while($total <= count($data) && $time <= 20) {
            sleep(2);

            $total = count(Reservation::getReservation(0));

            $time++;
        }

        return response()->json($data);
    }


    public function generate()
    {
        $reservations = Reservation::getReservation(0);

        return datatables($reservations)
        ->addIndexColumn()
        ->addColumn('action', function($reservation) {
            $token = csrf_token();
            $button = 
                '<div class="btn-group mr-2">
                          
                    <button type="button" class="btn btn-default">Action</button>
                          
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">

                        <span class="sr-only">Toggle Dropdown</span>
                        
                        <div class="dropdown-menu" role="menu">

                            <a class="dropdown-item" href="#cancelModal'.$reservation->rsv_id.'" data-toggle="modal" data-target="#cancelModal'.$reservation->rsv_id.'">

                                Cancel

                            </a>

                            <a class="dropdown-item" href="#confirmModal'.$reservation->rsv_id.'" data-toggle="modal" data-target="#confirmModal'.$reservation->rsv_id.'">

                                Confirm

                            </a>

                            <a class="dropdown-item" href="#finishModal'.$reservation->rsv_id.'" data-toggle="modal" data-target="#finishModal'.$reservation->rsv_id.'">

                                Finish

                            </a>

                        </div>
                      
                    </button>
                        
                </div>

                <a href="'.route('reservations.show', $reservation->rsv_id).'"><i class="fas fa-external-link-alt mr-1 text-primary"></i></a>

                <a href="#" data-toggle="modal" data-target="#deleteModal'.$reservation->rsv_id.'"><i class="far fa-trash-alt text-danger"></i></a>

                <div class="modal fade" id="deleteModal'.$reservation->rsv_id.'">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Reservations</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <p>Are you sure want to delete this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form action="'.route('reservations.destroy', $reservation->rsv_id).'" method="POST">

                                    <input type="hidden" name="_token" value="'.$token.'" />

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="btn btn-danger">Delete</button>
                              
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal fade" id="cancelModal'.$reservation->rsv_id.'">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Reservations</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <p>Are you sure want to cancel this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form action="'.route('reservations.cancel', $reservation->rsv_id).'" method="POST">

                                    <input type="hidden" name="_token" value="'.$token.'" />

                                    <button type="submit" class="btn btn-danger">Cancel Reservation</button>
                              
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal fade" id="confirmModal'.$reservation->rsv_id.'">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Reservations</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <p>Are you sure want to confirm this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form action="'.route('reservations.confirm', $reservation->rsv_id).'" method="POST">

                                    <input type="hidden" name="_token" value="'.$token.'" />

                                    <button type="submit" class="btn btn-info">Confirm Reservation</button>
                              
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal fade" id="finishModal'.$reservation->rsv_id.'">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h4 class="modal-title">Reservations</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <p>Are you sure want to finish this reservation ?</p>

                            </div>

                            <div class="modal-footer justify-content-between">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                <form action="'.route('reservations.finish', $reservation->rsv_id).'" method="POST">

                                    <input type="hidden" name="_token" value="'.$token.'" />

                                    <button type="submit" class="btn btn-success">Finish Reservation</button>
                              
                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                ';

                return $button;
        })
        ->toJson();
    }


    public function index()
    {
    	$finish_reservations = Reservation::getReservation(3);
        $confirm_reservations = Reservation::getReservation(1);
        $cancel_reservations = Reservation::getReservation(2);
        $pending_reservations = Reservation::getReservation(0);

    	return view('admin.reservations.index', 
            compact('finish_reservations', 'confirm_reservations', 'cancel_reservations', 'pending_reservations'
        ));
    }

    
    public function header() 
    {
        $reservation_headers = ReservationHeader::all();

        return view('admin.reservations.hd_index', compact('reservation_headers'));      
    }


    public function createHeader()
    {
        return view('admin.reservations.hd_add');
    }


    public function storeHeader(Request $request)
    {
        $this->validate($request, [
            'rsv_hd_title' => 'required',
            'rsv_hd_caption' => 'required',
            'rsv_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'rsv_hd_title.required' => 'Reservation Header Title is required!',
            'rsv_hd_caption.required' => 'Reservation Header Caption is required!',
            'rsv_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('rsv_hd_image')) {
            $image = time().'.'.$request->rsv_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->rsv_hd_image->move($destination, $image);
        }
        else {
            $image = 'default.jpg';
        }

        $reservation_header = ReservationHeader::create([
            'rsv_hd_title' => $request->rsv_hd_title,
            'rsv_hd_caption' => $request->rsv_hd_caption,
            'rsv_hd_image' => $image,
        ]);

        return redirect('admin/reservations/headers')->with('success', 'added reservation header');
    }


    public function editHeader(ReservationHeader $header)
    {
        return view('admin.reservations.hd_edit', compact('header'));
    }


    public function updateHeader(Request $request, ReservationHeader $header)
    {
        $this->validate($request, [
            'rsv_hd_title' => 'required',
            'rsv_hd_caption' => 'required',
            'rsv_hd_image' => 'image|mimes:jpeg,png,gif,svg|max:7048'
        ],
        [
            'rsv_hd_title.required' => 'Reservation Header Title is required!',
            'rsv_hd_caption.required' => 'Reservation Header Caption is required!',
            'rsv_hd_image.image' => 'This file is not an image!'
        ]);

        if($request->has('rsv_hd_image')) {
            $image = time().'.'.$request->rsv_hd_image->extension();

            $destination = public_path('assets/uploads');

            $request->rsv_hd_image->move($destination, $image);

            $header->rsv_hd_image = $image;
        }

        $header->rsv_hd_title = $request->rsv_hd_title;
        $header->rsv_hd_caption = $request->rsv_hd_caption;

        $header->update();

        return redirect('admin/reservations/headers')->with('success', 'updated reservation header');
    }


    public function destroyHeader(ReservationHeader $header)
    {
        $header->delete();

        return redirect('admin/reservations/headers')->with('success', 'deleted reservation header');
    }


    public function active(ReservationHeader $header)
    {
        $header->rsv_hd_active = 1;

        $header->update();

        DB::table('reservation_headers')->where('rsv_hd_id', '!=', $header->rsv_hd_id)->update(['rsv_hd_active' => 0]);

        return redirect('admin/reservations/headers')->with('success', 'used reservation header preset');

    }


    public function cancel(Reservation $reservation)
    {
        $reservation->rsv_status = 2;
        
        $reservation->update();

        $data = [
            'from' => 'stepjodevtest1@gmail.com',
            'from_name' => ReservationMessage::where('rsv_msg_status', 'dismiss')->first()->rsv_msg_name,
            'subject' => ReservationMessage::where('rsv_msg_status', 'dismiss')->first()->rsv_msg_subject,
            'logo' => Setting::first()->set_web_logo,
            'rsv_name' => $reservation->rsv_name,
            'rsv_code' => $reservation->rsv_code,
            'treat_name' => $reservation->treatment->treat_name,
            'treat_price' => $reservation->treatment->treat_price,
            'rsv_date' => $reservation->rsv_date,
            'rsv_time' => $reservation->rsv_time,
            'rsv_status' => 'Dismiss',
            'rsv_msg_content' => ReservationMessage::where('rsv_msg_status', 'dismiss')->first()->rsv_msg_content,
            'rsv_msg_footer' => ReservationMessage::where('rsv_msg_status', 'dismiss')->first()->rsv_msg_footer
        ]; 

        Mail::to($reservation->rsv_email, $reservation->rsv_name)->send(new FailMail($data));

        return redirect('admin/reservations')->with('warning', 'reservation has been cancelled');
    }


    public function confirm(Reservation $reservation)
    {
        $reservation->rsv_status = 1;
        
        $reservation->update();

        $data = [
            'from' => 'stepjodevtest1@gmail.com',
            'from_name' => ReservationMessage::where('rsv_msg_status', 'confirm')->first()->rsv_msg_name,
            'subject' => ReservationMessage::where('rsv_msg_status', 'confirm')->first()->rsv_msg_subject,
            'logo' => Setting::first()->set_web_logo,
            'rsv_name' => $reservation->rsv_name,
            'rsv_code' => $reservation->rsv_code,
            'treat_name' => $reservation->treatment->treat_name,
            'treat_price' => $reservation->treatment->treat_price,
            'rsv_date' => $reservation->rsv_date,
            'rsv_time' => $reservation->rsv_time,
            'rsv_status' => 'Confirm',
            'rsv_msg_content' => ReservationMessage::where('rsv_msg_status', 'confirm')->first()->rsv_msg_content,
            'rsv_msg_footer' => ReservationMessage::where('rsv_msg_status', 'confirm')->first()->rsv_msg_footer
        ]; 

        Mail::to($reservation->rsv_email, $reservation->rsv_name)->send(new ConfirmMail($data));
        
        return redirect('admin/reservations')->with('success', 'confirmed reservation');
    }


    public function finish(Reservation $reservation)
    {
        $reservation->rsv_status = 3;
        
        $reservation->update();

        return redirect('admin/reservations')->with('finish', 'reservation successfully done');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $finish_reservations = Reservation::getReservation(3);
        $confirm_reservations = Reservation::getReservation(1);
        $cancel_reservations = Reservation::getReservation(2);
        $pending_reservations = Reservation::getReservation(0);

        return view('admin.reservations.detail', compact(
            'reservation', 'finish_reservations', 'confirm_reservations', 'cancel_reservations', 'pending_reservations' 
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('admin/reservations')->with('success', 'deleted reservation');
    }


    public function on(ReservationMode $mode)
    {
        $mode->rsv_mode_active = 1;

        $mode->update();

        return redirect('admin/dashboard')->with('success', 'enabled reservation system');
    }


    public function off(ReservationMode $mode)
    {
        $mode->rsv_mode_active = 0;

        $mode->update();

        return redirect()->back()->with('warning', 'reservation system was disabled');
    }
}
