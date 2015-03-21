<?php namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Filesystem;
use Request, Storage, File;
use Aws\S3\S3Client;

class UploadController extends Controller {

    public function getIndex()
    {
        return view('demo.upload.index');
    }

    public function postIndex(Filesystem $filesystem)
    {
        $userfile = Request::file('userfile');

        $filename  = $userfile->getFilename();

        $extension = $userfile->getClientOriginalExtension();

        $path = 'uploads/screenshots/';
        $file = $filename . '.' . $extension;

        $pathWithFile = $path . $file;

        $x = Storage::disk('s3')->put($pathWithFile, File::get($userfile));

        var_dump(get_class_methods(Storage::disk('s3')));

        var_dump(get_class_methods(Storage::disk('s3')->getDriver()));

        var_dump(Storage::disk('s3')->getDriver()->getAdapter()->getClient()->getObjectUrl('teeplus', $pathWithFile));
    }

}