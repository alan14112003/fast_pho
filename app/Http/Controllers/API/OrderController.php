<?php

namespace App\Http\Controllers\API;

use App\Enums\OrderTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResponseTrait;
use App\Http\Requests\Order\ChangeStatusRequest;
use App\Models\Order;
use App\Models\OrderPhoto;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

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
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ;

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

            return $this->responseTrait('thành công', true, $data);
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

            return $this->responseTrait('thay đổi trạng thái thành công', true, null);
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
            ->find($id);
        ;

        if (is_null($order)) {
            return $this->responseTrait('Không có đơn hàng với id đã cho');
        }

        if (empty($order->orderProducts->toArray())) {
            return $this->responseTrait('Đây không phải đơn hàng sản phẩm');
        }

        $order->type = OrderTypeEnum::getNameByValue($order->type);

        return $this->responseTrait('thay đổi trạng thái thành công', true, $order);
    }

    //  hàm products trả về api order photo
    public function photos(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            //  Lấy ra tất cả các order photo và phân trang
            $ordersQr = Order::query()
                ->addSelect('orders.*')
                ->selectRaw('count(order_photo.id) as item_count')
                ->join('order_photo', 'orders.id', '=', 'order_photo.order_id')
            ;

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

            return $this->responseTrait('thành công', true, $data);
        } catch (\Exception $e) {
            return $this->responseTrait('có lỗi! ' . $e->getMessage());
        }
    }

    //  Xem hóa đơn của đơn hàng $id
    public function photo($id): \Illuminate\Http\JsonResponse
    {
        //  Lấy ra đơn hàng có $id
        $order = Order::query()
            ->find($id);
        ;

        if (is_null($order)) {
            return $this->responseTrait('Không có đơn hàng với id đã cho');
        }

        $orderPhotos = OrderPhoto::query()
            ->select(
                'order_photo.*',
                'p.file',
                'p.total',
                'p.type',
                'p.face_number',
                'p.is_cover',
                'p.descriptions',
                'p.price'
            )
            ->join('photos as p', 'p.id', '=', 'order_photo.photo_id')
            ->where('order_photo.order_id', $id)
            ->get()
        ;

        if (empty($orderPhotos->toArray())) {
            return $this->responseTrait('Đây không phải đơn hàng photo');
        }

        $order->order_photos = $orderPhotos;

        $order->type = OrderTypeEnum::getNameByValue($order->type);

        return $this->responseTrait('thay đổi trạng thái thành công', true, $order);
    }
}
