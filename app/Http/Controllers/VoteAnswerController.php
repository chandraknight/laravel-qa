<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Answer $answer)
    {
        dd('yoie are here');
        $vote = (int) request()->vote;

        auth()->user()->voteAnswer($answer, $vote);

        return back();
    }
}
