<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);
        return view('course', compact('courses'));
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course')->with('success', 'Course deleted successfully');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('editCourse', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_src' => 'nullable|string|regex:/^(\/[a-zA-Z0-9_\-\/]+(\.svg|\.jpg|\.jpeg|\.png|\.gif))$/',
        ]);

        $course = Course::findOrFail($id);
        $course->title = $request->title;
        $course->description = $request->description;
        $course->image_src = $request->image_src;
        $course->save();

        return redirect()->route('course')->with('success', 'Course updated successfully!');
    }

    public function create()
    {
        return view('createCourse');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image_src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Pastikan ada file yang di-upload
    if ($request->hasFile('image_src')) {
        // Upload file ke Cloudinary
        $uploadedFileUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
        $resultFileUrls =  (string) $uploadedFileUrl;

        // Membuat course baru dengan URL gambar yang di-upload
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_src' => $resultFileUrls,
        ]);

        return redirect()->route('course')->with('success', 'Course created successfully!');
    } else {
        // Jika tidak ada file yang di-upload, Anda bisa memberikan nilai default atau mengosongkan kolom gambar
        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_src' => 'path/to/default-image.jpg', // Gambar default jika tidak ada file yang di-upload
        ]);

        return redirect()->route('course')->with('success', 'Course created successfully!');
    }
}

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $courses = Course::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%'])->paginate(5);
        } else {
            $courses = Course::paginate(5);
        }

        return view('course', compact('courses'));
    }
}

