<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ResponseTrait;

    public function get(): \Illuminate\Http\JsonResponse
    {
        $about = About::query()->first();
        return $this->responseTrait('Thành công', true, $about);
    }

    public function update(Request $request): \Illuminate\Http\JsonResponse
    {
        $about = About::query()->update([
            'content' => $request->get('content')
        ]);

        return $this->responseTrait('Sửa nội dung thành công', true, $about);
    }
}
