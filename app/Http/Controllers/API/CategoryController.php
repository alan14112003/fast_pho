<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getSubCategories($id): array
    {
        $categories = [];
        $subCategories = Category::query()->where('parent_id', $id)->get();

        if (is_null($subCategories)) return $categories;

        foreach ($subCategories as $category) {
            $category->children = $this->getSubCategories($category->id);
            $categories[] = $category;
        }

        return $categories;
    }
    
    public function all()
    {
        $categories = Category::query()->whereNull('parent_id')->get();

        foreach ($categories as $category) {
            $category->children = $this->getSubCategories($category->id);
        }

        return response([
            'status' => true,
            'body' => $categories,
            'message' => 'Thành công'
        ]);
    }
}
