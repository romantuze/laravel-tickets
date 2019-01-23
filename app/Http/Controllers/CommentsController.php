<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comments;

class CommentsController extends Controller
{
  public function store(Request $request) 
	{
		$method = $request->method();

		if ($request->isMethod('post')) {

		    $comment = new Comments;

        $comment->ticket_id = (int) $request->ticket_id;

        $comment->user_id = (int) $request->user_id ?? 0;

       	$comment->message = $request->message;

        $path = $request->file('document')->store('uploads','public');
        
       	$comment->file = $path;

        $comment->save();

        flash('Сообщение отправлено!')->success();

		}
		return redirect()->route('tickets_read', ['id' => $request->ticket_id]);		
	}

}
