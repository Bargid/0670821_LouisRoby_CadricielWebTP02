<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::all();
        return view('pdfs.index', compact('pdfs'));
    }

    public function upload()
    {
        return view('pdfs.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf,doc,docx,zip|max:2048',
            'name' => 'required|string|max:255',
        ]);
    
        $uploadedFile = $request->file('pdf');
        $originalName = $uploadedFile->getClientOriginalName();
    
        $path = $uploadedFile->store('pdfs', 'public');
        $pdf = Pdf::create([
            'name' => $request->input('name'),
            'path' => $path,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('pdfs.index')->with('success', 'PDF Uploaded successfully.');
    }

    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('pdfs.show', compact('pdf'));
    }

    public function download($id)
    {
        $pdf = Pdf::findOrFail($id);
        $filePath = public_path('storage/' . $pdf->path);
        $fileName = $pdf->name . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
    
        return response()->download($filePath, $fileName);
    }

    public function edit($id)
    {
        $pdf = Pdf::findOrFail($id);
        return view('pdfs.edit', compact('pdf'));
    }

    public function update(Request $request, $id)
    {
        $pdf = Pdf::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $pdf->name = $request->input('name');
        $pdf->save();

        return redirect()->route('pdfs.index')->with('success', 'PDF updated successfully.');
    }

    public function destroy($id)
    {
        $pdf = Pdf::findOrFail($id);
        $pdf->delete();

        return redirect()->back()->with('success', 'PDF deleted successfully.');
    }
}
