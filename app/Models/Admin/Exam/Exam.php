<?php

namespace App\Models\Admin\Exam;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table="exams";
    protected $fillable=['title','category','registerd','exam_date','status','exam_duration','count','type','time_clock'];

}
