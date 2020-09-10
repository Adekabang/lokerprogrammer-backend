<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CourseRequest;
use App\Models\Course\{CategoryCourse, Course, SubCategoryCourse};
use Illuminate\Support\Str;


class CourseController extends Controller
{
    // Courses list page
    public function index()
    {
        $courses = Course::with('category', 'subCategory')->latest()->get();
        return \view('pages.admin.course.index', \compact('courses'));
    }

    // Form add course
    public function create()
    {
        $category = CategoryCourse::all();
        $subCategories = SubCategoryCourse::all();
        return \view('pages.admin.course.crud-course.create', \compact('category', 'subCategories'));
    }

    // Processing form add a course
    public function store(CourseRequest $request)
    {
        // Validasi image terpisah, krn mau custom nama image
        $request->validate([
            'thumbnail' => 'required|image',
        ]);
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/course', $filenamenya, 'public');
        } else {
            $gambarnya = 'assets/img/course/thumbnail.jpg';
        }
        // Instance for Course models
        $course = new Course();
        $course->course_name = $request->course_name;
        $course->category_id = $request->category_course;
        $course->sub_category_id = $request->sub_category_course;
        $course->slug = Str::slug($request->course_name);
        $course->course_author = $request->course_author;
        $course->label = $request->label;
        $course->thumbnail = $gambarnya;
        $course->description = $request->description;
        $course->status = $request->status;
        $course->save();

        return redirect('admin/course')->withToastSuccess('Course has created!');
    }

    // Show all courses in the backend
    public function showAll()
    {
        $courses = Course::latest()->get();
        return \view('pages.admin.course.show', \compact('courses'));
    }

    // Form edit course
    public function edit($id)
    {
        $category = CategoryCourse::all();
        $subCategories = SubCategoryCourse::all();
        $course = Course::with('subCategory')->findOrFail($id);
        return \view('pages.admin.course.crud-course.edit', \compact('course', 'category', 'subCategories'));
    }

    // Processing form edit course
    public function update(CourseRequest $request, $id)
    {
        $item = Course::findOrFail($id);
        // If no image uploaded
        $pic = $item->thumbnail;

        // If there's image uploaded
        if ($request->hasFile('thumbnail')) {
            $fullName = $request->thumbnail->getClientOriginalName();
            $extension = $request->thumbnail->getClientOriginalExtension();
            $onlyName = explode('.' . $extension, $fullName);
            $filenamenya = Str::slug($onlyName[0]) . '.' . $extension;
            $gambarnya = $request->thumbnail->storeAs('assets/img/course', $filenamenya, 'public');
        } else {
            $gambarnya = $pic;
        }

        Course::where('id', $id)->update([
            'category_id' => $request->category_course,
            'sub_category_id' => $request->sub_category_course,
            'course_name' => $request->course_name,
            'slug' => Str::slug($request->course_name),
            'course_author' => $request->course_author,
            'label' => $request->label,
            'thumbnail' => $gambarnya,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect('admin/course')->withToastSuccess('Course has updated!');
    }

    // Processing delete course
    public function destroy($id)
    {
        $item =  Course::findOrFail($id);
        $item->delete();

        return redirect('admin/course')->withToastSuccess('Course has deleted!');
    }
}
