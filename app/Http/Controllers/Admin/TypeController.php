<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Type\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    public function add_new_type(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
            $cat = new Type();
            $cat->name = $request->name;
            $cat->status = 1;
            $cat->save();
    }

    

    public function type_all()
    {
        $data['type'] = Type::get()->toArray();
        return response()->json([
            'results' => $data
        ], 200);
    }





}
