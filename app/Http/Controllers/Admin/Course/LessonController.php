<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\LessonCourseRequest;
use App\Models\Course\{Course, CourseLesson};
use Illuminate\Support\Str;


class LessonController extends Controller
{
    // Lesson list page
    public function index()
    {
        $lessons = CourseLesson::latest()->get();
        return \view('pages.admin.course.lesson.index', \compact('lessons'));
    }

    // Form add lesson
    public function create()
    {
        $courses = Course::all();
        return \view('pages.admin.course.lesson.crud-lesson.create', \compact('courses'));
    }

    // Processing form add Lesson
    public function store(LessonCourseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->lesson_name);
        CourseLesson::create($data);

        return redirect('admin/lesson')->withToastSuccess('Lesson has created!');
    }

    // Form edit lesson
    public function edit($id)
    {
        $courses = Course::all();
        $lesson = CourseLesson::findOrFail($id);
        return \view('pages.admin.course.lesson.crud-lesson.edit', \compact('courses', 'lesson'));
    }

    // Processing form edit Lesson
    public function update(LessonCourseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->lesson_name);
        $item = CourseLesson::findOrFail($id);
        $item->update($data);

        return redirect('admin/lesson')->withToastSuccess('Lesson has updated!');
    }

    // Processing delete lesson
    public function destroy($id)
    {
        $lesson = CourseLesson::findOrFail($id);
        $lesson->delete();

        return redirect('admin/lesson')->withToastSuccess('Lesson has deleted!');
    }
}
