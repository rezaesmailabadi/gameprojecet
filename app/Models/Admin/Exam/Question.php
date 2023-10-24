<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table="questions";

    protected $primaryKey="id";
    protected $fillbale=['exam_id','questions','ans','time_question','options','status','selected_option'];
    protected $casts=['options'=>'array'];

}
