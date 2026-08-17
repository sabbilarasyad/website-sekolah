<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Services\StoreOrderRequest;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini

class CanteenController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'available')->get();
        return view('canteen.index', compact('products'));
    }

    public function checkout(StoreOrderRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $totalPrice = 0;

            // Buat header order
            $order = Order::create([
                'user_id' => Auth::id(), // <-- Gunakan Auth::id() menggantikan auth()->id()
                'total_price' => 0,
                'status' => 'pending',
            ]);

            foreach ($validated['items'] as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['quantity']) {
                    throw new \Exception("Stok produk {$product->name} tidak mencukupi.");
                }

                $itemPrice = $product->price * $item['quantity'];
                $totalPrice += $itemPrice;

                $product->decrement('stock', $item['quantity']);
                if ($product->stock === 0) {
                    $product->update(['status' => 'out_of_stock']);
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);
            }

            $order->update(['total_price' => $totalPrice]);

            DB::commit();

            return redirect()->route('canteen.orders')
                ->with('success', 'Pesanan berhasil dibuat dan sedang diproses.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function userOrders()
    {
        $orders = Order::with('orderItems.product')
            ->where('user_id', Auth::id()) // <-- Gunakan Auth::id()
            ->latest()
            ->get();

        return view('canteen.orders', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,ready,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}