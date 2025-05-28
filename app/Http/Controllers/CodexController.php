<?php

namespace App\Http\Controllers;

use App\Models\Codex;
use Illuminate\Http\Request;

class CodexController extends Controller
{
  /**
   * Display a listing of codex entries, grouped by type.
   */
  public function index(Request $request)
  {
    $codexEntries = Codex::orderBy('type')->orderBy('name')->get()->groupBy('type');

    $isHtmx = $request->hasHeader('HX-Request');

    return view('outline.codex.index', compact('codexEntries'))
      ->fragmentIf($isHtmx, 'codex-list');
  }

  /**
   * Show the form for creating a new codex entry.
   */
  public function create()
  {
    return view('outline.codex.create');
  }

  /**
   * Store a newly created codex entry in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'type' => 'required|in:character,item,location',
      'description' => 'required|string',
    ]);

    $codex = Codex::create($data);

    return redirect()->route('outline.codex.show', $codex)
      ->with('success', 'Codex entry created successfully.');
  }

  /**
   * Display the specified codex entry.
   */
  public function show(Codex $codex)
  {
    return view('outline.codex.show', compact('codex'));
  }

  /**
   * Show the form for editing the specified codex entry.
   */
  public function edit(Codex $codex)
  {
    return view('outline.codex.edit', compact('codex'));
  }

  /**
   * Update the specified codex entry in storage.
   */
  public function update(Request $request, Codex $codex)
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'type' => 'required|in:character,item,location',
      'description' => 'required|string',
    ]);

    $codex->update($data);

    return redirect()->route('outline.codex.show', $codex)
      ->with('success', 'Codex entry updated successfully.');
  }

  /**
   * Remove the specified codex entry from storage.
   */
  public function destroy(Codex $codex)
  {
    $codex->delete();

    return redirect()->route('outline.codex.index')
      ->with('success', 'Codex entry deleted successfully.');
  }
}
