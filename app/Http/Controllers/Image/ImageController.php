<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $image = $data['image'];
        $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $filePath = Storage::disk('public')->put('/images', $image);

        return response()->json(['url' => url('/storage/' . $filePath)]);
    }
}
