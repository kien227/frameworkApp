<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class FileUpload extends Controller
{

    public function index()
    {
        $files = FILE::oldest()->paginate(7);
        if (Auth::user()->role == 'teacher') {
            return view('file.viewfile', compact('files'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return view('file.studentview', compact('files'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    function download($file_name){
        // $file = Storage::disk('storage/uploads')->get($file_name);
        // $file_name = req()->file('name');
        return response()->download('storage/uploads/'.$file_name);
    }

    public function create()
    {
        return view('/file/addfile');
    }

    public function fileUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileModel = new File;

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    public function edit(File $file)
    {
        return view('file.edit', compact('file'));
    }

    public function update(Request $request, File $file)
    {
        rename(Storage::disk('local')->path('public/uploads/' . $file->name), Storage::disk('local')->path('public/uploads/' . $request->name));

        $file->update($request->all());

        return redirect()->route('files.index')

            ->with('success', 'File updated successfully');
    }

    public function destroy(File $file)
    {
        $file->delete();

        return redirect()->route('files.index')

            ->with('success', 'File deleted successfully');
    }
}
