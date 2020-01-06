<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Company;
use App\Fisica;
use App\Juridica;
use App\Entrega;
use App\Customer;
use DB;
use PDF;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


class OrdersController extends Controller
{
    function index(Request $request)
    {
        $orders = Order::orderBy('dtVenda', 'DESC');
        $statuses = config('statuses');
        
        $companies = Company::all();
        $customers = Customer::all();

        return view('orders.index', [
            'orders' => $this->query($request, $orders)->paginate(),
            'statuses' => $statuses,
            'customers' => $customers,
            'companies' => $companies,

            'startDate' => $request->startDate,
            'endDate' => $request->endDate,
            'dsStatus' => $request->dsStatus,
            'cdClienteFisica' => $request->cdClienteFisica,
            'cdClienteJuridica' => $request->cdClienteJuridica,
            'cdProduto' => $request->cdProduto,
            'idboleto' => $request->idboleto,
        ]);
    }

    function edit($id)
    {
        $order = Order::findOrFail($id);
        $statuses = config('statuses');
        if($order->cdTipoCliente == 'f'){
            $fisica = Fisica::findOrFail($order->cdCliente);
            $entrega = Entrega::where('id_cliente', $order->cdCliente)->get();
            $order->client = $fisica;
            $order->entrega = $entrega[0];
        } else {
            $juridica = Juridica::findOrFail($order->cdCliente);
            $entrega = Entrega::where('id_cliente', $order->cdCliente)->get();
            $order->client = $juridica;
            $order->entrega = $entrega[0];
        }

        return view('orders.edit', compact('order', 'statuses'));
    }

    function update(Request $request, $id)
    {
        \auth()->user()->orders()::whereIdboleto($id)
            ->update($request->only('dsStatus'));

        return redirect()->route('orders.index');
    }

    function pendentes(Request $request, $id)
    {
        Order::find($id)
            ->update(['enviado' => true]);

        return redirect()->route('home');
    }

    function report(Request $request)
    {

    }

    public function pdf()
    {
        $orders = Order::all();
        $pdf = PDF::loadView('orders.pdf', compact('orders'));
        return $pdf->setPaper('A4', 'landscape')->download('orders.pdf');          
    }

    public function excel()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }

    private function query(Request $request, $orders)
    {
        $orders->when($request->startDate, function ($query, $startDate) {
            $query->where('dtVenda', '>=', $startDate . ' 00:00:00');
        });

        $orders->when($request->endDate, function ($query, $endDate) {
            $query->where('dtVenda', '<=', $endDate . ' 23:59:59');
        });

        $orders->when($request->dsStatus, function ($query, $dsStatus) {
            $query->where('dsStatus', $dsStatus);
        });

        $orders->when($request->cdProduto, function ($query, $cdProduto) {
            $query->where('cdProduto', $cdProduto);
        });

        $orders->when($request->cdClienteFisica, function ($query, $cdCliente) {
            $query->where('cdCliente', $cdCliente);
        });

        $orders->when($request->cdClienteJuridica, function ($query, $cdCliente) {
            $query->where('cdCliente', $cdCliente);
        });

        $orders->when($request->idboleto, function ($query, $idboleto) {
            $query->where('idboleto', $idboleto);
        });

        return $orders;
    }
}
