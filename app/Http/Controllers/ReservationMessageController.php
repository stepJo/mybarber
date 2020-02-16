<?php

namespace App\Http\Controllers;

use App\ReservationMessage;
use Illuminate\Http\Request;

class ReservationMessageController extends Controller
{
    public function index()
    {
    	$confirm_message = ReservationMessage::getConfirmMessage();
    	$dismiss_message = ReservationMessage::getDismissMessage();

    	return view('admin.reservations.message_index', compact('confirm_message', 'dismiss_message'));
    }


    public function update_confirm(Request $request, ReservationMessage $message)
    {	
    	if($request->rsv_msg_name != '') {
    		$message->rsv_msg_name = $request->rsv_msg_name;
    	}
        
        if($request->rsv_msg_email != '') {
    		$message->rsv_msg_email = $request->rsv_msg_email;
    	}

        if($request->rsv_msg_subject != '') {
    		$message->rsv_msg_subject = $request->rsv_msg_subject;
    	}

    	if($request->rsv_msg_content != '') {
    		$message->rsv_msg_content = $request->rsv_msg_content;
    	}

    	if($request->rsv_msg_footer != '') {
    		$message->rsv_msg_footer = $request->rsv_msg_footer;
    	}

		$message->update();

		return redirect('admin/messages')->with('success', 'updated confirm mail');
    }


    public function update_dismiss(Request $request, ReservationMessage $message)
    {   
        if($request->rsv_msg_name != '') {
            $message->rsv_msg_name = $request->rsv_msg_name;
        }
        
        if($request->rsv_msg_email != '') {
            $message->rsv_msg_email = $request->rsv_msg_email;
        }

        if($request->rsv_msg_subject != '') {
            $message->rsv_msg_subject = $request->rsv_msg_subject;
        }

        if($request->rsv_msg_content != '') {
            $message->rsv_msg_content = $request->rsv_msg_content;
        }

        if($request->rsv_msg_footer != '') {
            $message->rsv_msg_footer = $request->rsv_msg_footer;
        }

        $message->update();

        return redirect('admin/messages')->with('success', 'updated dismiss mail');
    }
}
