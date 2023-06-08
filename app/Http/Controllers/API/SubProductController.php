<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\SubProduct\StoreRequest;
use App\Http\Requests\SubProduct\UpdateRequest;
use App\Models\Product;
use App\Models\SubProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubProductController extends Controller
{
    use ResponseTrait;

    public function all($productId): \Illuminate\Http\JsonResponse
    {
        $subProducts = SubProduct::query()->where('product_id', $productId)->get();

        return $this->responseTrait('Hiển thị thành công', true, $subProducts);
    }

    public function store($productId, StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($productId);

            $subProduct = SubProduct::query()->create([
                'type' => $request->get('type'),
                'total' => $request->get('total'),
                'product_id' => $productId
            ]);

            $imagePath = Storage::putFileAs(
                "images/products/{$product->slug}/subs/{$subProduct->id}",
                $request->file('image'),
                "image.{$request->file('image')->extension()}"
            );

            $subProduct->update([
                'image' => $imagePath,
            ]);

            return $this->responseTrait('Thêm thành công', true, $subProduct);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function update($productId, $id, UpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($productId);
            $subProduct = SubProduct::query()->find($id);
            if (is_null($subProduct)) {
                return $this->responseTrait('Sản phẩm không tồn tại');
            }
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = Storage::putFileAs(
                    "images/products/{$product->slug}/subs/{$subProduct->id}",
                    $request->file('image'),
                    "image.{$request->file('image')->extension()}"
                );
                $data['image'] = $imagePath;
            }

            $subProduct->update($data);

            return $this->responseTrait("Sửa thành công", true, $subProduct);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
