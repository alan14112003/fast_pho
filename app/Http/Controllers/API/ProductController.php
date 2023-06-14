<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ResponseTrait;

    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $q = $request->get('q');
        $sale = $request->get('sale');
        $new = $request->get('new');
        $categorySlug = $request->get('category-slug');
        $categoryIndex = $request->get('category-index');

        $productsQr = Product::query()->select('products.*')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id');

        if ($categorySlug) {
            //  Kiểm tra xem nó ở cấp mấy trong category để biết đường lấy con của nó
            switch ($categoryIndex) {
                case 1: {
                        $productsQr = $productsQr->whereRaw(
                            "categories.parent_id IN (
                            Select id from categories
                            Where parent_id = (
                                Select id from categories
                                where slug = '$categorySlug'
                            )
                        )"
                        );
                        break;
                    }
                case 2: {
                        $productsQr = $productsQr->whereRaw(
                            "parent_id = (
                            Select id from categories
                            where slug = '$categorySlug'
                        )"
                        );
                        break;
                    }
                case 3: {
                        $productsQr = $productsQr->whereRaw("categories.slug = '$categorySlug'");
                        break;
                    }
            }
        }

        //  Nếu có sale thì lấy ra các sản phẩm có sale khác 0
        if ($sale) {
            $productsQr = $productsQr->where('sale', '<>', 0);
        }

        //  Nếu có new thì lấy ra các sản phẩm từ 14 ngày trước đổ lại
        if ($new) {
            // Lấy ngày 14 ngày trước
            $startDate = Carbon::now()->subDays(14)->toDateString();

            $productsQr = $productsQr->whereDate('products.created_at', '>=', $startDate);
        }

        $productsQr = $productsQr->where('products.name', 'like', "%$q%");

        // Lấy ra các sản phẩm theo kiểu phân trang
        $products = $productsQr->paginate(15);
        return $this->responseTrait('Thành công', true, $products);
    }

    public function get($id)
    {
        $product = Product::query()->find($id);
        $nodeCategoryId = Category::query()->find($product->category_id)->parent_id;
        $rootCategoryId = Category::query()->find($nodeCategoryId)->parent_id;

        $product->node_category_id = $nodeCategoryId;
        $product->root_rategory_id = $rootCategoryId;

        return $this->responseTrait('Thành công', true, $product);
    }

    public function store(StoreRequest $request)
    {
        try {
            $product = Product::query()->create([
                'name' => $request->get('name'),
                'descriptions' => $request->get('descriptions'),
                'price' => $request->get('price'),
                'sale' => $request->get('sale') ?? 0,
                'category_id' => $request->get('category_id'),
            ]);

            $imagePath = Storage::disk('public')->putFileAs(
                "images/products/{$product->slug}",
                $request->file('image'),
                "image.{$request->file('image')->extension()}"
            );
            $product->update([
                'image' => $imagePath,
            ]);

            return $this->responseTrait('Thêm thành công', true, $product);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function update($id, UpdateRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::query()->find($id);
            if (is_null($product)) {
                return $this->responseTrait('Sản phẩm không tồn tại');
            }
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = Storage::disk('public')->putFileAs(
                    "images/products/{$product->slug}",
                    $request->file('image'),
                    "image.{$request->file('image')->extension()}"
                );
                $data['image'] = $imagePath;
            }

            $product->update($data);

            return $this->responseTrait("Sửa thành công", true, $product);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::query()->find($id);

            if (!$product) {
                return $this->responseTrait('Sản phẩm không tồn tại');
            }

            $product->delete();
            Storage::deleteDirectory("public/images/products/{$product->slug}");

            return $this->responseTrait('Xóa thành công', true);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
