<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Upload;

class FileController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
        'title' => 'required:max:255'
      ]);

      auth()->user()->files()->create([
        'title' => $request->get('title')
      ]);

      return back()->with('message', 'Your file is submitted Successfully');
    }

    public function upload(Request $request)
    {
      $uploadedFile = $request->file('file');
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('public')->putFileAs(
        'files/',
        $uploadedFile,
        $filename
      );

      $upload = new Upload;
      $upload->filename = $filename;


      $upload->user()->associate(auth()->user());

      $upload->save();

      return response()->json([
        'id' => $upload->id,
        'filename' => "storage/files/". $filename
      ]);
    }
}
