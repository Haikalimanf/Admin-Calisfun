<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    // Menampilkan daftar challenges
    public function index()
    {
        $challenges = Challenge::with('lesson')->paginate(10); // Mengambil data challenge beserta relasi lesson
        return view('challenge', compact('challenges'));
    }

    // Menampilkan form untuk membuat challenge baru
    public function create()
    {
        $lessons = Lesson::all(); // Menampilkan semua lesson untuk memilih
        return view('createChallenge', compact('lessons'));
    }

    // Menyimpan challenge baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|string|in:hint,quiz',  // Pastikan ini sesuai dengan nilai enum
            'lesson_id' => 'required|exists:lessons,id',
            'image_src' => 'nullable|image',
        ]);
    
        $challenge = new Challenge();
        $challenge->question = $request->question;
        $challenge->type = $request->type;  // Menggunakan type yang valid
        $challenge->lesson_id = $request->lesson_id;
    
        if ($request->hasFile('image_src')) {
            $challenge->image_src = $request->file('image_src')->store('images', 'public');
        }
    
        $challenge->save();
    
        return redirect()->route('challenge')->with('success', 'Challenge created successfully');
    }
    
    

    // Menampilkan form untuk mengedit challenge
    public function edit($id)
    {
        $challenge = Challenge::findOrFail($id);
        $lessons = Lesson::all();
        return view('editChallenge', compact('challenge', 'lessons'));
    }

    // Mengupdate challenge
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',  // Ganti 'title' menjadi 'question'
            'type' => 'required|string',  // Pastikan 'type' ada di form
            'lesson_id' => 'required|exists:lessons,id',  // Relasi lesson_id
            'image_src' => 'nullable|image',  // Menambahkan validasi untuk image
        ]);

        $challenge = Challenge::findOrFail($id);
        $challenge->question = $request->question;
        $challenge->type = $request->type;
        $challenge->lesson_id = $request->lesson_id;
        if ($request->hasFile('image_src')) {
            $challenge->image_src = $request->file('image_src')->store('images', 'public');
        }
        $challenge->save();

        return redirect()->route('challenges.index')->with('success', 'Challenge updated successfully');
    }

    // Menghapus challenge
    public function destroy($id)
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->delete();

        return redirect()->route('challenges.index')->with('success', 'Challenge deleted successfully');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
    
        $search = $request->input('search');  // Mengambil input search dari request
    
        if ($search) {
            $challenges = Challenge::where('question', 'ilike', '%' . $search . '%')->paginate(5);
        } else {
            $challenges = Challenge::paginate(5);  // Jika tidak ada pencarian, tampilkan semua unit
        }
    
        return view('challenges.index', compact('challenges'));
    }
}
