<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Keyboard;
use Carbon\Carbon;

class KeyboardController extends Controller
{
    public function home() {
        return Inertia::render('Keyboard/Home');
    }

    public function index() {
        $added_keyboards = Keyboard::where('is_seeded', false)->orderBy('created_at', 'asc')->get();

        $stage_keyboards = Keyboard::where('type', 'Stage Keyboard')->get();
        $expandable_synthesizers = Keyboard::where('type', 'Expandable Synthesizer')->get();
        $performance_synthesizers = Keyboard::where('type', 'Performance Synthesizer')->get();
        $workstation_synthesizers = Keyboard::where('type', 'Workstation Synthesizer')->get();

        return Inertia::render('Keyboard/Index', [
            'stage_keyboards' => $stage_keyboards,
            'expandable_synthesizers' => $expandable_synthesizers,
            'performance_synthesizers' => $performance_synthesizers,
            'workstation_synthesizers' => $workstation_synthesizers,
            'added_keyboards' => $added_keyboards,
        ]);
    }

    public function createKeyboard() {
        return Inertia::render('Keyboard/CreateKeyboard');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Keyboard::create([
            'image' => $imagePath,
            'brand' => $request->brand,
            'model' => $request->model,
            'type' => $request->type,
            'color' => $request->color,
            'price' => $request->price,
            'is_seeded' => false
        ]);
        
        return redirect('/keyboards')->with('success', 'New keyboard has been added to the hub!');
    }

    public function specs($model) {
        $specs = Keyboard::where('model', $model)->get();
        return Inertia::render('Keyboard/SpecsKeyboard', [
            'specs' => $specs
        ]);
    }
    // public function detail($model) {
    //     $keyboards = Keyboard::where('model', $model)->firstOrFail();

    //     return view('detail', compact('keyboards'));
    // }

    public function edit($model) {
        $edits = Keyboard::where('model', $model)->first();
        $specs = Keyboard::where('model', $model)->get();

        return inertia('Keyboard/EditKeyboard', [
            'edits' => $edits,
            'specs' => $specs,
        ]);
    }   

    public function update(Request $request, $model)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand' => 'required',
            'model' => 'required',
            'type' => 'required',
            'color' => 'required',
            'price' => 'required|numeric',
        ]);

        $keyboard = Keyboard::where('model', $model)->firstOrFail();

        // Handle file upload if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $keyboard->image = $imagePath;
        }

        // Update other fields
        $keyboard->brand = $request->brand;
        $keyboard->model = $request->model;
        $keyboard->type = $request->type;
        $keyboard->color = $request->color;
        $keyboard->price = $request->price;
        $keyboard->is_seeded = false;

        $keyboard->save();

        return redirect('/keyboards')->with('success', 'Keyboard updated successfully.');
    }

public function destroy($model)
{
    $keyboard = Keyboard::where('model', $model)->firstOrFail();
    $keyboard->delete();

    return redirect()->route('index')->with('success', 'Keyboard deleted successfully.');
}



    
// Route::delete('/keyboards/{model}', [KeyboardController::class, 'destroy'])->name('destroy');

    // public function destroy($id)
    // {
    //     $cat = Cat::findOrFail($id);
    //     $cat->delete();

    //     return redirect()->route('cat')->with('success', 'Cat deleted successfully.');
    // }
}

