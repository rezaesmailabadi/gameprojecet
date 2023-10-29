<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
       //Adding new exam categories
       public function add_new_category(Request $request)
       {
   
           $validator = Validator::make($request->all(), [
               'name' => 'required',
           ]);
   
           if ($validator->fails()) {
               $arr = array('status' => 'false', 'message' => $validator->errors()->all());
           } else {
   
               $cat = new Category();
               $cat->name = $request->name;
               $cat->status = 1;
               $cat->save();
               $arr = array('status' => 'true', 'message' => 'Success', 'reload' => url('admin/exam_category'));
           }
       }
   


    public function category_all()
    {
        $data['category'] = Category::get()->toArray();
        return response()->json([
            'results' => $data
        ], 200);
    }

   




}
