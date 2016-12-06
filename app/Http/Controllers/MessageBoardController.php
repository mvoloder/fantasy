<?php

namespace App\Http\Controllers;

use App\MessageBoard;
use App\UserLeague;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MessageBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user_leagues = UserLeague::all();
        $messageBoards = MessageBoard::all();

        return view('messageboard.messageboard', compact('messageBoards'))/*, ['leagueId' => $user_leagues->league_id]))*/;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messageboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'topic' => 'required | max:50',
                'message' => 'required | max:255'
            ]
        );

        if ($validator->fails()){
            return view('league');
        }else{
            $messageBoard = new MessageBoard();

            $messageBoard->topic = Input::get('topic');
            $messageBoard->message = Input::get('message');

            $messageBoard->save();
        }

        return redirect()->route('messageboard.show', $messageBoard->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messageBoard = MessageBoard::find($id);
        return view('messageboard.show', compact('messageBoard'));
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
