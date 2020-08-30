<?php

namespace App\Http\Controllers;

use App\Models\Course\CoursePackage;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_packages = CoursePackage::with('features')->get();
        return \view('pages.front.kelas.index', \compact('course_packages'));
    }
}
