<?php

namespace Tests\Mocks;

use Illuminate\Http\UploadedFile;

class ZipCodesFileMock
{
    public static function create(): UploadedFile
    {
        $filename = storage_path('files/zip-codes-example.txt');

        return new UploadedFile(storage_path('files/zip-codes-example.txt'), 'zip-codes-example.txt', null, null, true, true);
    }

    public static function image(): UploadedFile
    {
        return UploadedFile::fake()->image('file.png', 600, 600);
    }
}
