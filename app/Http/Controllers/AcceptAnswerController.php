<?php
/*THIs is single action cntroller*/

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{

    public function __invoke(Answer $answer)
    {
        $this->authorize('accetp',$answer);
        $answer->question->acceptBestAnswer($answer);
        return back();
    }
}
