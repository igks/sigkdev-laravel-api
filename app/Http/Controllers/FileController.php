<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpg|max:2048'
        ]);

        $fileModel = new File;
        if ($req->file()) {
            $fileReq = $req->file('file');
            $path = storage_path('app/public/uploads/');
            $fileReq->move($path, $req->file('file')->getClientOriginalName());

            $fileModel->name = time() . '_' . $req->file('file')->getClientOriginalName();
            $fileModel->file_path = $path;
            $fileModel->save();

            return response()->json(["message" => "File uploaded"], 201);
        }
    }
}
