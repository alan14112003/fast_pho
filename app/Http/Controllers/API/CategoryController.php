<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ResponseTrait;

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

    public function all(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::query()->whereNull('parent_id')->get();

        foreach ($categories as $category) {
            $category->children = $this->getSubCategories($category->id);
            $category->index = 1;
        }

        return $this->responseTrait('Thành công', true, $categories);
    }

    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $category = Category::query()->create($request->validated());
            return $this->responseTrait('Thành công', true, $category);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function update($id, UpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $category = Category::query()->find($id);

            if (is_null($category)) {
                return $this->responseTrait('Id không tồn tại');
            }

            if($request->get('name') === $category->name) {
                return $this->responseTrait('Thành công', true, $category);
            }

            $category->slug = null;
            $category->update($request->validated());

            return $this->responseTrait('Thành công', true, $category);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function destroy($id): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $category = Category::query()->find($id);

            if (is_null($category)) {
                return $this->responseTrait('Id không tồn tại');
            }

            $this->deleteChildren($id);
            $category->delete();
            return $this->responseTrait('Thành công', true);

        } catch (\Throwable $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
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
