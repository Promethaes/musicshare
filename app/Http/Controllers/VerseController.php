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
        return view('verses.index');
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

        $file = $request->file('file');
        $file->store('verses');

        // $verseModel = new Verse;

        // if ($request->file()) {
        //     $verseName = time() . '_' . $request->file->getClientOriginalName();
        //     $versePath = $request->file('file')->storeAs('uploads', $verseName, 'public');
        //     $verseModel->name = time() . '_' . $request->file->getClientOriginalName();
        //     $verseModel->file_path = '/storage/' . $versePath;
        //     $verseModel->save();
        //     return back()
        //         ->with('success', 'Verse added.')
        //         ->with('file', $verseName);
        // }

        // $request->user()->verses()->create($validated);

        

        return redirect(route('verses.index'))->with('message', 'success');
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
