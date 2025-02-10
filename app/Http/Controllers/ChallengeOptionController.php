<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeOption;
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
        // Validate the incoming request
        $request->validate([
            'text' => 'required|string|max:255',
            'correct' => 'required|boolean',
            'challenge_id' => 'required|exists:challenge,id',
            'image_src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'audio_src' => 'nullable|mimes:mp3,wav,ogg|max:2120',
        ]);

        // Find the challenge option by ID
        $challengeOption = ChallengeOption::findOrFail($id);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image_src')) {
            // Delete the old image if it exists
            if ($challengeOption->image_src) {
                $imageName = basename($challengeOption->image_src); // Get the image name from the URL
                cloudinary()->destroy($imageName); // Delete the old image from Cloudinary
            }

            // Upload the new image to Cloudinary
            $uploadedImageUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
            $challengeOption->image_src = $uploadedImageUrl; // Save the new image URL
        }

        // Handle audio upload if a new audio file is provided
        if ($request->hasFile('audio_src')) {
            // Delete the old audio file if it exists (assume it is stored locally or on Cloudinary)
            if ($challengeOption->audio_src) {
                $audioName = basename($challengeOption->audio_src);
                cloudinary()->destroy($audioName); // Delete the old audio file from Cloudinary
            }

            // Upload the new audio file to Cloudinary
            $uploadedAudioUrl = cloudinary()->upload($request->file('audio_src')->getRealPath(), [
                'resource_type' => 'auto', // Auto-detects the media type (audio, video)
            ])->getSecurePath();
            $challengeOption->audio_src = $uploadedAudioUrl; // Save the new audio URL
        }

        // Update the other fields in the challenge option
        $challengeOption->text = $request->text;
        $challengeOption->correct = $request->correct;
        $challengeOption->challenge_id = $request->challenge_id;

        // Save the updated challenge option
        $challengeOption->save();

        // Redirect to the challenge options list with a success message
        return redirect()->route('challenge-options')->with('success', 'Challenge Option updated successfully.');
    }

    public function destroy($id)
    {
        $challengeOption = ChallengeOption::findOrFail($id);
        $challengeOption->delete();

        return redirect()->route('challenge-options')->with('success', 'Challenge Option deleted successfully.');
    }

    public function create()
    {
        // Retrieve all challenges for use in a dropdown or other purpose
        $challenges = Challenge::all();
        return view('createChallengeOptions', compact('challenges'));
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

        // Handle image upload
        if ($request->hasFile('image_src')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('image_src')->getRealPath())->getSecurePath();
            $resultFileUrls = (string) $uploadedFileUrl;
        }

        // Handle audio upload
        if ($request->hasFile('audio_src')) {
            $uploadedAudioUrl = cloudinary()->upload($request->file('audio_src')->getRealPath(), [
                'resource_type' => 'auto',
            ])->getSecurePath();
            $audioUrl = (string) $uploadedAudioUrl;
        }

        // Create a new ChallengeOption record
        ChallengeOption::create([
            'text' => $request->text,
            'correct' => $request->correct,
            'challenge_id' => $request->challenge_id,
            'image_src' => $resultFileUrls ?? null, // If image was uploaded
            'audio_src' => $audioUrl ?? null, // If audio was uploaded
        ]);

        return redirect()->route('challenge-options')->with('success', 'Challenge Option created successfully.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);

        $search = $request->input('search');  // Mengambil input search dari request

        if ($search) {
            $challengeOptions = ChallengeOption::where('text', 'ilike', '%' . $search . '%')->paginate(5);
        } else {
            $challengeOptions = ChallengeOption::paginate(5);  // Jika tidak ada pencarian, tampilkan semua challenge
        }

        return view('challenge-options', compact('challengeOptions'));
    }

}
