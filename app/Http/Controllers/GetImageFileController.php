<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class GetImageFileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(string $folder = null, $image)
    {

        $allowed_folders = ['product', 'image'];

        if ($folder !== null && !in_array($folder, $allowed_folders)) {
            return abort(404);
        }

        if ($folder === 'product') {
            $path = "image/{$folder}/{$image}";
        } else {
            $path = "{$folder}/{$image}";
        }

        $fullPath = storage_path("app/public/{$path}");


        if (!File::exists($fullPath)) {
            $path = "image/{$folder}/product_default.png";
            $fullPath = storage_path("app/public/{$path}");
            if (!File::exists($fullPath)) {
                abort(404);
            }
        }

        $file = File::get($fullPath);
        $type = File::mimeType($fullPath);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
