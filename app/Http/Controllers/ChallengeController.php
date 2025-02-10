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
            'type' => 'required|string',
            'lesson_id' => 'required|exists:lessons,id',
            'image_src' => $request->type == 'HINT' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable', // Validasi gambar hanya untuk tipe HINT
        ]);

        
        // Ambil nilai order yang terbesar berdasarkan lesson_id
        $maxOrder = Challenge::where('lesson_id', $request->lesson_id)->max('order');
    
        // Jika tipe adalah HINT dan ada file gambar yang di-upload
        if ($request->type == 'HINT' && $request->hasFile('image_src')) {
            // Upload file ke Cloudinary
            $uploadedFileUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
            $resultFileUrls = (string) $uploadedFileUrl;
    
            // Membuat challenge baru dengan URL gambar yang di-upload
            Challenge::create([
                'question' => $request->question,
                'type' => $request->type,
                'lesson_id' => $request->lesson_id,
                'order' => $maxOrder + 1,
                'image_src' => $resultFileUrls,
            ]);
        } else {
            // Jika tipe SELECT atau tidak ada file yang di-upload, simpan challenge tanpa gambar
            Challenge::create([
                'question' => $request->question,
                'type' => $request->type,
                'lesson_id' => $request->lesson_id,
                'order' => $maxOrder + 1,
                'image_src' => null, // Tidak ada gambar untuk tipe SELECT
            ]);
        }
    
        return redirect()->route('challenges')->with('success', 'Challenge created successfully!');
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
        'question' => 'required|string|max:255',
        'type' => 'required|string',
        'lesson_id' => 'required|exists:lessons,id',
        'image_src' => $request->type == 'HINT' ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable',
    ]);


    $challenge = Challenge::findOrFail($id);
    $challenge->question = $request->question;
    $challenge->type = $request->type;
    $challenge->lesson_id = $request->lesson_id;

    // Jika ada file gambar yang diupload, hapus gambar lama dan upload gambar baru
    if ($request->hasFile('image_src')) {
        // Hapus gambar lama jika ada
        if ($challenge->image_src) {
            $imageName = basename($challenge->image_src); // Ambil nama file dari URL
            cloudinary()->destroy($imageName); // Hapus gambar lama dari Cloudinary
        }

        // Upload gambar baru
        $uploadedFileUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
        $challenge->image_src = $uploadedFileUrl;  // Menyimpan URL gambar baru dari Cloudinary
    }

    // Simpan perubahan data challenge
    $challenge->save();

    // Redirect setelah update
    return redirect()->route('challenges')->with('success', 'Challenge updated successfully');
}


    // Menghapus challenge
    public function destroy($id)
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->delete();

        return redirect()->route('challenges')->with('success', 'Challenge deleted successfully');
    }

    // Pencarian challenge berdasarkan query
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $search = $request->input('search');  // Mengambil input search dari request

        if ($search) {
            $challenges = Challenge::where('question', 'ilike', '%' . $search . '%')->paginate(5);
        } else {
            $challenges = Challenge::paginate(5);  // Jika tidak ada pencarian, tampilkan semua challenge
        }

        return view('challenges', compact('challenges'));
    }
}
