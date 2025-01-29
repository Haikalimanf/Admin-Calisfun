<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
         // Mengambil semua data dari tabel courses
        $courses = Course::paginate(5);
        return view('course', compact('courses'));  // Kirim data ke view 'course'
    }
    public function destroy($id)
    {
        // Mencari course berdasarkan id
        $course = Course::findOrFail($id);
        
        // Menghapus course dari database
        $course->delete();
        
        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('course')->with('success', 'Course deleted successfully');
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);  // Cari course berdasarkan ID
        return view('editCourse', compact('course'));  // Kirim data ke view 'editCourse'
    }


public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image_src' => 'nullable|string|regex:/^(\/[a-zA-Z0-9_\-\/]+(\.svg|\.jpg|\.jpeg|\.png|\.gif))$/', // Menyesuaikan dengan format path relatif
    ]);

    // Cari course berdasarkan ID dan update
    $course = Course::findOrFail($id);
    $course->title = $request->title;
    $course->description = $request->description;
    $course->image_src = $request->image_src;
    $course->save();

    // Redirect ke halaman courses dengan pesan sukses
    return redirect()->route('course')->with('success', 'Course updated successfully!');
}


// CourseController.php

public function create()
{
    return view('createCourse');
}

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image_src' => 'nullable|string',
    ]);

    // Membuat course baru tanpa timestamps
    Course::create([
        'title' => $request->title,
        'description' => $request->description,
        'image_src' => $request->image_src,
    ]);

    // Redirect ke halaman course dengan pesan sukses
    return redirect()->route('course')->with('success', 'Course created successfully!');
}
public function search(Request $request)
{
    $search = $request->input('search');  // Mengambil input search dari request

    if ($search) {
        $courses = Course::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%'])
                         ->paginate(5);
    } else {
        $courses = Course::paginate(5);  // Jika tidak ada pencarian, tampilkan semua course
    }

    return view('course', compact('courses'));
}



}

