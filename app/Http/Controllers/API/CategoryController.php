<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
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

    public function all(): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
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
                'message' => "Có lỗi! {$e->getMessage()}"
            ]);
        }
    }

    public function update($id, UpdateRequest $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $category = Category::query()->find($id);

            if (is_null($category)) {
                return response([
                    'status' => false,
                    'body' => null,
                    'message' => 'Id không tồn tại',
                ]);
            }

            if ($request->get('name') === $category->name) {
                return response([
                    'status' => true,
                    'body' => $category,
                    'message' => "Thành công"
                ]);
            }

            $category->slug = null;
            $category->update($request->validated());

            return response([
                'status' => true,
                'body' => $category,
                'message' => "Thành công"
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'body' => null,
                'message' => "Có lỗi! {$e->getMessage()}"
            ]);
        }
    }

    public function destroy($id): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $category = Category::query()->find($id);

            if (is_null($category)) {
                return response([
                    'status' => false,
                    'body' => null,
                    'message' => 'Id không tồn tại',
                ]);
            }

            $this->deleteChildren($id);
            $category->delete();
            return response([
                'status' => true,
                'body' => null,
                'message' => 'Thành công',
            ]);
        } catch (\Throwable $e) {
            return response([
                'status' => false,
                'body' => null,
                'message' => "Có lỗi! {$e->getMessage()}"
            ]);
        }
    }

    public function deleteChildren($parentId)
    {
        $categoryIds = Category::query()->where('parent_id', $parentId)->pluck('id')->toArray();
        Category::query()->whereIn('id', $categoryIds)->delete();

        foreach ($categoryIds as $categoryId) {
            $this->deleteChildren($categoryId);
        }
    }
}
