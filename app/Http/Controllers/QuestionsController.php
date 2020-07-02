<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQuestionRequest;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        \DB::enableQueryLog(); // this helps enable query log
        //$questions=Question::latest()->paginate(5); // lasy loading
        $questions=Question::with('user')->latest()->paginate(5); // egger oading
        //return view('questions.index',compact('questions'));
         view('questions.index',compact('questions'))->render();// this is for query log
        dd(\DB::getQueryLog()); // this helps to display query log */

        $questions = Question::with('user')->latest()->paginate(5); // egger oading
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = new question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request)
    {
        //

       $request->user()->questions()->create($request->only('title','body'));
       return redirect()->route('questions.index')->with('success','your question has been submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        //
        $question->update($request->only('title','body'));
        return redirect('/questions')->with('success',"Your question hasbeen updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Questions $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        return redirect('/questions')->with('success',"Your question hasbeen deleted");
    }
}
