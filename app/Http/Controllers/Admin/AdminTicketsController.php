<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tickets;
use App\User;

class AdminTicketsController extends Controller
{
	public function users()
    {
    	$users = User::orderBy('created_at','desc')->get();
    	return view('admin.users')->withUsers($users);
    }
    
	public function tickets()
    {
    	$tickets = Tickets::orderBy('created_at','desc')->get();
    	return view('admin.tickets')->with('tickets',$tickets);
    }

    public function edit($id)
    {
    	$id = (int) $id;
		$ticket = Tickets::where('id',$id)->first();
    	return view('admin.edit')->with('ticket',$ticket);
    }

    public function update(Request $request, $id)
    {
        $ticket = Tickets::find($id);
        $ticket->name = $request->name;
        $ticket->description = $request->description;
        $ticket->done = $request->done;
        $ticket->save();
        return redirect()
        ->route('admin_tickets')
         ->with('message', 'Тикет обновлен');
    }

}
