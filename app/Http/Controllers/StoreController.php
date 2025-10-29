<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $images = $data['images'] ?? [];
        unset($data['images']);

        $post = Post::create($data);
        foreach ($images as $image){
            $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
            $filePath = Storage::disk('public')->put('/images', $image);

            Image::create([
                'path' => $filePath,

                'url' => url('/storage/' . $filePath),
                'post_id' => $post->id
            ]);
        }

        return response(['status' => 'ok']);
    }
}
