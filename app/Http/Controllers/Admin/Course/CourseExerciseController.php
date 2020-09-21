<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\ExerciseRequest;
use App\Models\Course\Course;
use App\Models\Course\Exercise;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CourseExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return \view('pages.admin.course.exercise.index', \compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Exercise();
        return view('pages.admin.course.exercise.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRequest $request)
    {
        $data = $request->all();
        $model = Exercise::create($data);

        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Exercise::findOrFail($id);
        return \view('pages.admin.course.exercise.show-question', \compact('model'));
    }

    public function showCourse($id)
    {
        $course = Course::findOrFail($id);
        $exercises = Exercise::where('course_id', $id)->get();
        return \view('pages.admin.course.exercise.show', \compact('course', 'exercises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Exercise::findOrFail($id);
        return view('pages.admin.course.exercise.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExerciseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = \Str::slug($request->category_name);
        $item = Exercise::findOrFail($id);
        $item->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Exercise::findOrFail($id);
        $category->delete();
    }

    public function dataTable($id)
    {
        $model = Exercise::query()->where('course_id', $id);
        return DataTables::of($model)
            ->addColumn('Action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('courseExercise.show', $model->id),
                    'url_edit' => route('courseExercise.edit', $model->id),
                    'url_destroy' => route('courseExercise.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['Action'])
            ->make(true);
    }
}
