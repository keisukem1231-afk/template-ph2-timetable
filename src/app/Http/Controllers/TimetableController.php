<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TimetableController extends Controller
{
    public function index()
    {
        $section1 = DB::select("
            SELECT * FROM courses
            where day = '1'
            order by period ASC;
        ");

        $section2 = DB::select("
           SELECT * FROM courses
            where required = 'true'
            order by code ASC;
        ");
        return view('timetable', ['section1' => $section1, 'section2' => $section2]);
    }
}
