<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Exam\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    




    // تعریف یک آزمون جدید 
    public function add_new_exam(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required', 'exam_date' => 'required', 'exam_category' => 'required',
            'exam_duration' => 'required', 'count' => 'required', 'type' => 'required', 'time_clock' => 'required'
        ]);


        $exam = new Exam();

        $exam->title = $request->title;
        $exam->exam_date = $request->exam_date;
        $exam->time_clock = $request->time_clock;
        $exam->exam_duration = $request->exam_duration;// مدت آزمون
        $exam->category = $request->exam_category;
        $exam->type = $request->exam_type;
        $exam->count = $request->count;
        $exam->status = 1;
        $exam->save();

        return response()->json([
            'results' => $exam
        ], 200);
    }



    
//    تعریف سوال برای آزمون جدید 
    public function add_new_question(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'question' => 'required',
            'option_1' => 'required',
            'option_2' => 'required',
            'option_3' => 'required',
            'option_4' => 'required',
            'ans' => 'required'
        ]);

        if ($validator->fails()) {
            $arr = array('status' => 'flase', 'message' => $validator->errors()->all());
        } else {

            $q = new Exam();
            $q->exam_id = $request->exam_id;
            $q->questions = $request->question;

            if ($request->ans == 'option_1') {
                $q->ans = $request->option_1;
            } elseif ($request->ans == 'option_2') {
                $q->ans = $request->option_2;
            } elseif ($request->ans == 'option_3') {
                $q->ans = $request->option_3;
            } else {
                $q->ans = $request->option_4;
            }

            $q->status = 1;
            
            $x = array('option1' => $request->option_1,  
            'option2' => $request->option_2,
            'option3' => $request->option_3, 
            'option4' => $request->option_4);
            $q->options = $x;
            $q->save();
            $arr = array('status' => 'true', 'message' => 'successfully added', 'reload' => url('admin/add_questions/' . $request->exam_id));
        }
    }


    public function exma_all()
    {
        $data['manageexam'] = Exam::get()->toArray();
        return response()->json([
            'results' => $data
        ], 200);



    }





}
