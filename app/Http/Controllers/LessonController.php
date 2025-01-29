<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the lessons.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian
        $lessons = Lesson::with('unit'); // Eager loading relasi unit

        if ($search) {
            $lessons->where('title', 'LIKE', '%' . $search . '%'); // Filter pencarian
        }

        $lessons = $lessons->paginate(10); // Pagination

        return view('lessons', compact('lessons')); // Kembalikan ke view
    }

    /**
     * Show the form for creating a new lesson.
     */
    public function create()
    {
        $units = Unit::all(); // Ambil semua unit
        return view('createUnitLesson', compact('units'));
    }
    

    /**
     * Store a newly created lesson in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id', // Ensure unit_id is valid
            'order' => 'nullable|integer', // Optional order validation
        ]);
    
        // Calculate the order
        $order = $request->order ?? (Lesson::where('unit_id', $request->unit_id)->max('order') ?? 0) + 1;
    
        // Save the lesson to the database
        Lesson::create([
            'title' => $request->title,
            'unit_id' => $request->unit_id,
            'order' => $order,
        ]);
    
        // Redirect with a success message
        return redirect()->route('lessons')->with('success', 'Lesson created successfully!');
    }
    
    
    
    

    /**
     * Show the form for editing the specified lesson.
     */
    public function edit($id)
    {
        // Cari lesson berdasarkan ID
        $lesson = Lesson::findOrFail($id);
    
        // Ambil semua unit untuk dropdown
        $units = Unit::all();
    
        // Kirim data lesson dan units ke view
        return view('editUnitLesson', compact('lesson', 'units'));
    }
    
    

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
        ]);

        // Cari lesson berdasarkan ID
        $lesson = Lesson::findOrFail($id);

        // Update data lesson
        $lesson->update([
            'title' => $request->input('title'),
            'unit_id' => $request->input('unit_id'),
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('lessons')->with('success', 'Lesson updated successfully!');
    }

    /**
     * Remove the specified lesson from storage.
     */
    public function destroy($id)
    {
        // Cari lesson berdasarkan ID
        $lesson = Lesson::findOrFail($id);
    
        // Hapus lesson
        $lesson->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('lessons')->with('success', 'Lesson deleted successfully!');
    }
    

    /**
     * Search lessons based on keyword.
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $search = $request->input('search');  // Mengambil input search dari request
    
        if ($search) {
            $lessons = lesson::where('title', 'ilike', '%' . $search . '%')->paginate(5);
        } else {
            $lessons = lesson::paginate(5);  // Jika tidak ada pencarian, tampilkan semua unit
        }
    
        return view('lessons', compact('lessons'));

    }
    
    
    
}
