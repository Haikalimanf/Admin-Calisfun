<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
    // Ambil semua data unit dengan relasi course
    $units = Unit::with('course')->paginate(5); // Eager loading relasi 'course'

    return view('unit', compact('units')); // Kirim data ke view
    }

    public function destroy($id)
    {
        // Mencari unit berdasarkan id
        $unit = Unit::findOrFail($id);
        
        // Menghapus unit dari database
        $unit->delete();
        
        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('unit')->with('success', 'Unit deleted successfully');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $courses = Course::all(); // Ambil semua data courses
    
        return view('editUnit', compact('unit', 'courses'));
    }
    

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'nullable|exists:courses,id', // Pastikan course_id adalah ID yang valid dari tabel courses
        ]);
    
        // Cari unit berdasarkan ID dan update
        $unit = Unit::findOrFail($id);
        $unit->title = $request->title;
        $unit->description = $request->description;
        $unit->course_id = $request->course_id; // Update course_id
        $unit->save();
    
        // Redirect ke halaman units dengan pesan sukses
        return redirect()->route('unit')->with('success', 'Unit updated successfully!');
    }
    
    
    

    public function create()
    {
        $courses = \App\Models\Course::all(); // Ambil semua data Course dari database
        return view('createUnit', compact('courses')); // Kirim data ke view
    }
    
    

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id', // Pastikan course_id valid
            'order' => 'nullable|integer', // Validasi order (opsional)
        ]);
    
        // Simpan data ke database
        Unit::create([
            'title' => $request->title,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'order' => $request->order ?? Unit::max('order') + 1, // Gunakan nilai dari input atau urutan terakhir + 1
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('unit')->with('success', 'Unit created successfully!');
    }
    
    
    

    public function search(Request $request)
    {
        $search = $request->input('search');  // Mengambil input search dari request

        if ($search) {
            $units = Unit::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                         ->paginate(5);
        } else {
            $units = Unit::paginate(5);  // Jika tidak ada pencarian, tampilkan semua unit
        }

        return view('unit', compact('units'));
    }
}
