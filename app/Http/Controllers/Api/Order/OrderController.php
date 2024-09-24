<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\Order\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Traits\Responser;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use Responser;

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $order =  Order::create($request->except('products'));
            foreach ($request->products as $item) {
                $product = Product::find($item['id']);
                if (($product->stock - $item['amount']) < 0) {
                    return $this->returnError('403', __('dashboard.out_of_stock_for') . $product->title );
                }
                $product->update(['stock' => $product->stock - $item['amount']]);
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'amount' => $item['amount'],
                ]);
            }
            DB::commit();
            return $this->returnSuccessMassage(__('dashboard.your_request_sent_successfully'));
        } catch (Exception $e) {
            DB::rollBack();
            return $this->returnError('', __('dashboard.something_went_wrong'));
        }
    }
}
