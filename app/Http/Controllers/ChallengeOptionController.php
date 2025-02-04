<?php

namespace App\Http\Controllers;

use App\Models\ChallengeOption;
use Illuminate\Http\Request;

class ChallengeOptionController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        $challengeOptions = ChallengeOption::when($search, function($query, $search) {
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
        return view('createChallengeOptions'); // Mengarah ke halaman create
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'correct' => 'required|boolean',
            'challenge_id' => 'required|exists:challenges,id',
        ]);

        // Menyimpan data ke database
        ChallengeOption::create($request->all());

        return redirect()->route('challenge-options')->with('success', 'Challenge Option created successfully.');
    }
}
