<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ResponseTrait;

    public function all(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
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

            return response([
                'status' => true,
                'body' => $products,
                'message' => 'Hiển thị thành công',
            ]);
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::query()->find($id);

            if ($product) {
                $product->delete();

                return $this->responseTrait('Xóa thành công', true);
            }

            return $this->responseTrait('Sản phẩm không tồn tại');
        } catch (\Exception $e) {
            return $this->responseTrait("Có lỗi! {$e->getMessage()}");
        }
    }
}
