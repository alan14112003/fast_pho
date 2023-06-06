<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getSubCategories($id, $index = 2): array
    {
        $categories = [];
        $subCategories = Category::query()->where('parent_id', $id)->get();

        if (is_null($subCategories)) return $categories;

        foreach ($subCategories as $category) {
            $category->children = $this->getSubCategories($category->id, $index + 1);
            $category->index = $index;
            $categories[] = $category;
        }

        return $categories;
    }

    public function all()
    {
        $categories = Category::query()->whereNull('parent_id')->get();

        foreach ($categories as $category) {
            $category->children = $this->getSubCategories($category->id);
            $category->index = 1;
        }

        return response([
            'status' => true,
            'body' => $categories,
            'message' => 'Thành công'
        ]);
    }

    public function store(StoreRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $category = Category::query()->create($request->validated());
            return response([
                'status' => true,
                'body' => $category,
                'message' => "Thành công"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'body' => null,
                'message' => "Có lỗi {$e->getMessage()}"
            ]);
        }
    }
}
