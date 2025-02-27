<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\file;
use App\Http\Requests\StoreFileRequest;

class FileController extends Controller
{
    public function StoreAndGivePath(StoreFileRequest $request)
    {
        $file_paths = [];
        $fileurl = [];
        if($request->hasFile('files')){

            foreach($request->file('files') as $key => $mero_file){

            $filepath = $this->storefile($mero_file,'my_folder',$key);

            File::create([
               'file_path' => $filepath
            ]);

            $file_paths[] = $filepath;
            $fileurl[] = url('storage/' . $filepath);
        }
    }

        return response()->json([
            'message' => 'file uploaded successfully',
            'file-path' => $file_paths,
            'file_url' => $fileurl
        ]);

    }

    protected function storefile($file, $folder, $key)
    {
        $filename = time() . "_{$key}." . $file->getClientOriginalExtension();

        return $file->storeAs($folder, $filename, 'public');
        }
}
