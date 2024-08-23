<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VerseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        //  return view('verses.index');
        return view('verses.index', [
            'verses' => Verse::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //

        // $file = $request->file('file');
        // $file->store('verses');

        $validated = $request->validate([
            'file' => 'required|max:2048',
        ]);

        $file = $request->file('file');
        if ($file) {
            $verseModel = $request->user()->verses()->create($validated);
            $verseName = time() . '_' . $file->getClientOriginalName();
            $versePath = $file->store('verses');
            $verseModel->name = time() . '_' . $file->getClientOriginalName();
            $verseModel->file_path = '/storage/' . $versePath;
            $verseModel->save();
            // $request->user()->verses()->create($validated);
            return redirect(route('verses.index'))->with('message', 'success');
        }

        // $request->user()->verses()->create($validated);
        return redirect(route('verses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Verse $verse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Verse $verse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Verse $verse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Verse $verse)
    {
        //
    }
}
