<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Facades\Validator;
use App\Traits\GenTraits;

class QuestionController extends Controller
{
    use GenTraits;
    public function index (Request $request){
        
            return Question::all();
            } 
//........................................................................................
   
public function store(Request $request)
{
    $request->validate([
     
        'point_question' => 'required|in:0,5',
        'question' => 'required',
        'answer_question' => 'required|min:1|max:4',
        'correct_answer' => 'required|min:1|max:4',
        'quiz_id' => 'required|exists:quizs,id',
       
    ]);

    
    $quiz = new Question;
  
    $quiz->point_question = $request->point_question;
    $quiz->question = $request->question;
    $quiz->correct_answer = $request->correct_answer;
    $quiz->answer_question = $request->answer_question;
    $quiz->quiz_id = $request->quiz_id;
    
    $quiz->save();

    return response()->json(['message' => 'add Quiz succcessfuly'], 200);
}
//........................................................................................
public function update(Request $request, $id)
{
    $question = Question::find($id);
    if (!$question) {
        return "Question not found";
    }
    
    $validator = Validator::make($request->all(), [
        'point_question' => 'required|in:0,5',
        'question' => 'required',
        'quiz_id' => 'required',
        'correct_answer' => 'required|min:1|max:4',
     
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }
    
    
    $question->quiz_id = $request->quiz_id;
    
    $question->question = $request->question;
    $question->point_question = $request->point_question;
  
    $question->save();
    
    return "Question updated successfully";
}
//...........................................................................................
public function cheack_point($id){
    
    $question = Question::find($id);
    if (!$question) {
        return "question not found";
    }
    if ($question->correct_answer == $question->answer_question) {
        $question->point_question = 5;
    } else {
        $question->point_question = 0;
    }
    $question->save();
}
//.............................................................................................
public function update_answer(Request $request, $id)
{
    $question = Question::find($id);
    if (!$question) {
        return "question not found";
    }
    
    $validator = Validator::make($request->all(), [
        'answer_question' => 'required|min:1|max:4',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }
    
    $question->answer_question = $request->answer_question;
   
  
    $question->save();
    call_user_func([$this, 'cheack_point'], $id);
    return "question updated successfully";
}
//...................................................................................................
public function show($question)
{

    try {
        $question = Question::find($question);

        if( $question){
         return $this->success('','200',$question);}
        
    } catch (Exception $ex) {
        return $this->error('cannot show anysthing','error','500');
    }}
    //....................................................................................................
    public function destroy($question)
{
    $question = Question::find($question);
    if ($question) {
        $question->delete();
        return $this->success( '' , '200','question delete');
    } else {
        return $this->error('cannot delete anysthing','error','500');
    }
}
//............................................................................................................
}



