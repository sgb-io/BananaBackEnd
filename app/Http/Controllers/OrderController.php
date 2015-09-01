<?php

namespace App\Http\Controllers;

use App\Order;
use App\Sweety;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return JsonResponse::create(Order::with('sweeties')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->setTotal($request->input('total'));
        $order->save();

        foreach ($request->input('sweeties') as $sweetyId) {
            $order->sweeties()->attach(Sweety::findOrFail($sweetyId));
        }
        $order->save();

        return JsonResponse::create($order->load('sweeties'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return JsonResponse::create(Order::with('sweeties')->findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->sweeties()->detach();
        $order->delete();
    }
}
