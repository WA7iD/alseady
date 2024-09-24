<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Order\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:orders-read')->only('index');
        $this->middleware('permission:orders-update')->only('edit', 'update');
        $this->middleware('permission:orders-delete')->only('destroy');
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(15);
        return view('dashboard.site.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('dashboard.site.orders.show', compact('order'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $data =   $request->validated();
        $order->update($data);
        return back()->with([
            'success' => __('dashboard.updated_successfully')
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index',)->with(['success' => __('messages.deleted successfully')]);
    }
}
