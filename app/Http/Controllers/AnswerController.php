<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Validator;
use App\Traits\GenTraits;
class AnswerController extends Controller
{
    use GenTraits;
    public function index (Request $request){
        
            return Answer::all();
            } 
//...........................................................................................
public function store(Request $request)
{
    $request->validate([
        'question_id' => 'required|exists:questions,id',
        
        'answer' => 'required',
      
    ]);

   
    $answer = new Answer;
    $answer->question_id = $request->question_id;
    $answer->answer = $request->answer;
   
    $answer->save();

    return response()->json(['message' => 'add succcessfuly'], 200);
}
//........................................................................................
public function update(Request $request, $id)
{
    $answer = Answer::find($id);
    if (!$answer) {
        return "answer not found";
    }
    
    $validator = Validator::make($request->all(), [
        'question_id' => 'required',
        'answer' => 'required',
      
     
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }
    
    
  
    
    $answer->question_id = $request->question_id;
    $answer->answer = $request->answer;
  
    $answer->save();
    
    return "answer updated successfully";
}
//...........................................................................................
public function destroy($answer)
{
    $answer = Answer::find($answer);
    if ($answer) {
        $answer->delete();
        return $this->success( '' , '200','answer delete');
    } else {
        return $this->error('cannot delete anysthing','error','500');
    }
}
//................................................................................................
public function show($answer)
    {

        try {
            $answer = Answer::find($answer);

            if( $answer){
             return $this->success('','200',$answer);}
            
        } catch (Exception $ex) {
            return $this->error('cannot show anysthing','error','500');
        }
    }
    //.............................................................................................
}
