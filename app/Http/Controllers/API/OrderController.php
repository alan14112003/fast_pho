<?php

namespace App\Http\Controllers\API;

use App\Enums\OrderTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Order\ChangeStatusRequest;
use App\Http\Requests\Order\CreateProductsOrderRequest;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use ResponseTrait;

    //  hàm products trả về api order product
    public function products(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            //  Lấy ra tất cả các order product và phân trang
            $ordersQr = Order::query()
                ->addSelect('orders.*')
                ->selectRaw('count(order_product.id) as item_count')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id');

            if ($request->has('status') && $request->get('status') !== 'All') {
                $ordersQr->where('status', $request->get('status'));
            }

            $orders = $ordersQr
                ->groupBy('orders.id')
                ->latest('created_at')
                ->paginate();

            foreach ($orders as $order) {
                $order->type = OrderTypeEnum::getNameByValue($order->type);
            }

            $data = [
                'orders' => $orders,
                'status' => $request->get('status')
            ];

            return $this->responseTrait('Thành công', true, $data);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    //  Đổi tình trạng đơn hàng
    public function changeStatus(ChangeStatusRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            //  Lấy ra đơn hàng với $id
            $order =  Order::query()->find($id);

            //  Nếu không có đơn hàng với id thì trả về false
            if (is_null($order)) {
                return $this->responseTrait('Không tồn tại đơn hàng này');
            }

            //  Nếu có đơn hàng thì đổi tình trạng của nó và trả về true
            $order->update($request->validated());

            return $this->responseTrait('Thay đổi trạng thái thành công', true, null);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    //  Xem hóa đơn của đơn hàng $id
    public function product($id): \Illuminate\Http\JsonResponse
    {
        //  Lấy ra đơn hàng có $id
        $order = Order::query()
            ->with('orderProducts')
            ->find($id);;

        if (is_null($order)) {
            return $this->responseTrait('Không có đơn hàng với id đã cho');
        }

        if (empty($order->orderProducts->toArray())) {
            return $this->responseTrait('Đây không phải đơn hàng sản phẩm');
        }

        $order->type = OrderTypeEnum::getNameByValue($order->type);

        return $this->responseTrait('Thành công', true, $order);
    }

    public function productsCreate(CreateProductsOrderRequest $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {

            $productsRequest = json_decode($request->get('products'));

            //  Lẩy ra tất cả các id để tìm sản phẩm dựa trên đó
            $productIds = [];
            foreach ($productsRequest as $productRequest) {
                $productIds[] = $productRequest->id;
            }

            if (Auth::check()) {
                if (Auth::user()->province != $request->get('user_province') ||
                    Auth::user()->district != $request->get('user_district') ||
                    Auth::user()->ward != $request->get('user_ward')
                ) {
                    User::query()->find(Auth::id())->update([
                        'province' => $request->get('user_province'),
                        'district' => $request->get('user_district'),
                        'ward' => $request->get('user_ward'),
                    ]);
                }
            }

            //  Lấy ra tất cả các sản phẩm có ids
            $products = Product::query()
                ->select(
                    'products.id as product_id',
                    'products.name',
                    'products.price',
                    'products.sale',
                    'sp.id as sub_product_id',
                    'sp.type',
                    'sp.total'
                )
                ->join('sub_products as sp', 'sp.product_id', '=', 'products.id')
                ->whereIn('sp.id', $productIds)
                ->get()
            ;

            //  Kiểm tra sản phẩm đã hết hàng chưa
            foreach ($products as $product) {
                $productRequest = $productsRequest[array_search($product->sub_product_id, $productIds)];
                if ($product->total - $productRequest->quantity < 0) {
                    return $this->responseTrait("Sản phẩm {$products->name}({$products->type} không đủ");
                }
            }

            //  Tạo ra order
            $order = Order::query()->create([
                'user_id' => Auth::id(),
                'user_name' => $request->get('user_name'),
                'user_phone' => $request->get('user_phone'),
                'user_address' => $request->get('full_address'),
                'type' => $request->get('payment'),
            ]);

            //  Tạo ra Order Product
            foreach ($products as $product) {
                $productRequest = $productsRequest[array_search($product->sub_product_id, $productIds)];
                OrderProduct::query()->create([
                    'order_id' => $order->id,
                    'product_id' => $product->product_id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'product_sale' => $product->sale,
                    'sub_product_id' => $product->sub_product_id,
                    'product_type' => $product->type,
                    'total' => $productRequest->quantity,
                ]);

                SubProduct::query()->find($product->sub_product_id)->update([
                    'total' => $product->total - $productRequest->quantity,
                ]);
            }

            DB::commit();
            $expiration = Carbon::now()->addYear()->timestamp;
            return $this->responseTrait('Đặt hàng thành công', true)
                ->withCookie(cookie('cart', json_encode([]), $expiration));
        } catch (\Throwable $e) {
            DB::rollBack();
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    //  hàm products trả về api order photo
    public function photos(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            //  Lấy ra tất cả các order photo và phân trang
            $ordersQr = Order::query()
                ->addSelect('orders.*')
                ->selectRaw('count(order_photo.id) as item_count')
                ->join('order_photo', 'orders.id', '=', 'order_photo.order_id');

            if ($request->has('status') && $request->get('status') !== 'All') {
                $ordersQr->where('status', $request->get('status'));
            }

            $orders = $ordersQr
                ->groupBy('orders.id')
                ->latest('created_at')
                ->paginate();

            foreach ($orders as $order) {
                $order->type = OrderTypeEnum::getNameByValue($order->type);
            }

            $data = [
                'orders' => $orders,
                'status' => $request->get('status')
            ];

            return $this->responseTrait('Thành công', true, $data);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    //  Xem hóa đơn của đơn hàng $id
    public function photo($id): \Illuminate\Http\JsonResponse
    {
        //  Lấy ra đơn hàng có $id
        $order = Order::query()
            ->find($id);;

        if (is_null($order)) {
            return $this->responseTrait('Không có đơn hàng với id đã cho');
        }

        $orderPhotos = OrderPhoto::query()
            ->select(
                'order_photo.*',
                'p.file',
                'p.total',
                'pt.name as type',
                'p.face_number',
                'p.is_cover',
                'p.descriptions',
                'p.price'
            )
            ->join('photos as p', 'p.id', '=', 'order_photo.photo_id')
            ->join('photo_types as pt', 'pt.id', '=', 'p.type_id')
            ->where('order_photo.order_id', $id)
            ->get();

        if (empty($orderPhotos->toArray())) {
            return $this->responseTrait('Đây không phải đơn hàng photo');
        }

        $order->order_photos = $orderPhotos;

        $order->type = OrderTypeEnum::getNameByValue($order->type);

        return $this->responseTrait('Thành công', true, $order);
    }
}
