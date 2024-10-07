<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz_result;
use App\Models\Quiz;
use Illuminate\Support\Facades\Validator;
use App\Traits\GenTraits;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
class Quiz_reusltController extends Controller
{
    use GenTraits;
    public function index (Request $request){
        
     return Quiz_result::all();
     } 
//......................................................................................
public function store(Request $request)
{
    $request->validate([
        'main_level_id' => 'required|exists:main_levels,id',
        'quiz_id' => 'required|exists:quizs,id',
        'student_id' => 'required|exists:students,id',
        'result' => 'required',
      
    ]);

   
    $result = new Quiz_result;
    $result->main_level_id = $request->main_level_id;
    $result->quiz_id = $request->quiz_id;
    $result->student_id = $request->student_id;
    $result->result = $request->result;
   
    $result->save();

    return response()->json(['message' => 'add succcessfuly'], 200);
}
//........................................................................................
public function update(Request $request, $id)
{
    $reuslt = Quiz_result::find($id);
    if (!$reuslt) {
        return "Quiz_result not found";
    }
    
    $validator = Validator::make($request->all(), [
        'result' => 'required',
        'main_level_id' => 'required',
        'quiz_id' => 'required',
        'student_id' => 'required',
      
     
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 400);
    }
    
    
  
    
    $reuslt->main_level_id = $request->main_level_id;
    $reuslt->quiz_id = $request->quiz_id;
    $reuslt->result = $request->result;
    $result->student_id = $request->student_id;
  
    $answer->save();
    
    return "result updated successfully";
}
//...........................................................................................
public function destroy($answer)
{
    $reuslt = Quiz_result::find($reuslt);
    if ($reuslt) {
        $reuslt->delete();
        return $this->success( '' , '200','reuslt delete');
    } else {
        return $this->error('cannot delete anysthing','error','500');
    }
}
//...............................................................................................
public function show($reuslt)
    {

        try {
            $reuslt = Quiz_result::find($reuslt);

            if( $reuslt){
             return $this->success('','200',$reuslt);}
            
        } catch (Exception $ex) {
            return $this->error('cannot show anysthing','error','500');
        }
    }
    //..........................................................................................
    public function checkPoint(Request $request)
{
    $request->validate([
        'main_level_id' => 'required|exists:main_levels,id',
        'quiz_id' => 'required|exists:quizs,id',
        'student_id' => 'required|exists:students,id',
    ]);

    $quiz_id = $request->quiz_id;
  
    $total_points = DB::table('questions')->where('quiz_id', $quiz_id)->sum('point_question');
    $quizResult = Quiz_result::find($quiz_id);
    $quizResult->main_level_id = $request->main_level_id;
    $quizResult->quiz_id = $quiz_id;
    $quizResult->result = $total_points;
    $quizResult->student_id = $request->student_id;
    $quizResult->save();

   
}
    
    }

