<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Reagent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;


class OrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['reagents'])->get();

        foreach ($orders as $order) {
            if ($order->date_done <= date('Y-m-d') & $order->status != 'delivered') {
                foreach ($order->reagents as $reagent) {
                    $reagent_order = DB::table('reagent_orders')
                        ->where('reagent_id', $reagent->id)
                        ->where('order_id', $order->id)
                        ->first();
                    if ($reagent_order) {
                        $reagent->available_stock += $reagent_order->quantity;
                        $reagent->save();
                    }
                }
                $order->status = 'Delivered';
                $order->save();
            }
        }

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reagents = Reagent::pluck('code', 'id');

        return view('admin.orders.create', compact('reagents'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $quantities = $request['quantities'];
        $reagents = $request['reagents'];
        $all_details = array_map(function ($reagents, $quantities) {
            return array_combine(
              ['reagent_id', 'quantity'],
              [$reagents,$quantities]
            );
          }, $reagents, $quantities);
       
          $inserts = [];
          foreach ($all_details as $detail) {
              $inserts[] = [
                  'order_id' => $order->id,
                  'reagent_id' => $detail['reagent_id'],
                  'quantity' => $detail['quantity'],
              ];
          }
        DB::table('reagent_orders')->insert($inserts);
        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reagents = Reagent::pluck('code', 'id');

        $order->load('reagents');

        return view('admin.orders.edit', compact('order', 'reagents'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        $order->reagents()->sync($request->input('reagents', []));

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('reagents');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        $orders = Order::find(request('ids'));

        foreach ($orders as $order) {
            $order->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
