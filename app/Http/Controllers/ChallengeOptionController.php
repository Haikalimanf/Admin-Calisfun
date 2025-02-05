<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeOption;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ChallengeOptionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $challengeOptions = ChallengeOption::when($search, function ($query, $search) {
            return $query->where('text', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('challenge-options', compact('challengeOptions', 'search'));
    }


    public function edit($id)
    {
        $challengeOption = ChallengeOption::findOrFail($id);
        return view('editChallengeOptions', compact('challengeOption'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $challengeOption = ChallengeOption::findOrFail($id);
        $challengeOption->update($request->all());

        return redirect()->route('challenge-options.index')->with('success', 'Challenge Option updated successfully.');
    }

    public function destroy($id)
    {
        $challengeOption = ChallengeOption::findOrFail($id);
        $challengeOption->delete();

        return redirect()->route('challenge-options.index')->with('success', 'Challenge Option deleted successfully.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $challengeOptions = ChallengeOption::where('text', 'like', '%' . $search . '%')->paginate(10);
        return view('challenge-options', compact('challengeOptions', 'search'));
    }
    public function create()
{
    // Ambil data dari model Challenge
    $challenges = Challenge::all(); // Ambil data challenges untuk dropdown atau kebutuhan lainnya
    return view('createChallengeOptions', compact('challenges')); // Passing variabel ke view
}


public function store(Request $request)
{
    $request->merge([
        'correct' => filter_var($request->correct, FILTER_VALIDATE_BOOLEAN),
    ]);

    
    $request->validate([
        'text' => 'required|string|max:255',
        'correct' => 'required|boolean', 
        'challenge_id' => 'required|exists:challenge,id',
        'image_src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'audio_src' => 'nullable|mimes:mp3,wav,ogg|max:2120',
    ]);


    if ($request->hasFile('image_src')) {
        $uploadedFileUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
        $resultFileUrls = (string) $uploadedFileUrl;
    }

    if ($request->hasFile('audio_src')) {
        $uploadedAudioUrl = cloudinary()->upload($request->file('audio_src')->getRealPath(), [
            'resource_type' => 'video',
        ])->getSecurePath();
        $audioUrl = (string) $uploadedAudioUrl;
    }

    ChallengeOption::create([
        'text' => $request->text,
        'correct' => $request->correct,
        'challenge_id' => $request->challenge_id,
        'image_src' => $resultFileUrls ?? null ,
        'audio_src' => $audioUrl ?? null,
    ]);

    return redirect()->route('challenge-options')->with('success', 'Challenge Option created successfully.');
}


}
