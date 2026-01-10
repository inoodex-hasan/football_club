<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('backend.orders.index');
    }
    public function changeApproveStatus(Request $request)
    {
        // dd($request->all());
        $product = Order::findOrFail($request->id);
        $product->status = $request->value;
        $product->save();
        return response(['message' => 'Order Approved Status has been changed!']);
    }
}
