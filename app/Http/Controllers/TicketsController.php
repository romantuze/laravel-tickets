<?php

namespace App\Http\Controllers;
use App\Tickets;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{


    public function index()
    {
    	$tickets = Tickets::orderBy('created_at','desc')->get();
    	return view('tickets.index')->with('tickets',$tickets);
    }

    public function create() 
	{
		return view('tickets.create');
	}

	public function store(Request $request) 
	{
		$method = $request->method();
		
		if ($request->isMethod('post')) {

		$ticket = new Tickets;

        $ticket->name = $request->name;

       	$ticket->description = $request->description;

        $ticket->save();

        flash('Тикет создан!')->success();

		}
		return redirect()->route('tickets');		
	}

	public function read($id)
	{
		$id = (int) $id;
		$ticket = Tickets::where('id',$id)->first();
		$user_id = Auth::id();
		$comments = Comments::where('ticket_id',$id)->get();

    	return view('tickets.read', ['ticket' => $ticket, 'user_id' => $user_id, 'comments' => $comments]);
	}

}
