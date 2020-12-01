<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
	public function getFiles()
	{
		$path = public_path('/storage/video');
      	$files = preg_grep('~\.(mp4)$~', scandir($path));
      	//$out = json_encode($files);
      	return $files;
      	//return response()->json($files);

      	//dd($files);


      /*$files = Storage::files('public/video');
      dd($files);*/

	}

    public function saveVideo(Request $request)
	{
	    // Validate (size is in KB)
	    $request->validate([
	        'photo' => 'required|file',
	    ]);

	    // Read file contents...
	    $contents = file_get_contents($request->photo->path());

	    // ...or just move it somewhere else (eg: local `storage` directory or S3)
	    $newPath = $request->photo->store('public/video');
	}

}
