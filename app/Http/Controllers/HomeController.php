<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Events\PedidoEvent;

class HomeController extends Controller
{
  
    
    public function index()
    {
        
        return view('home');
    }
    
    public function fetchOrders()
    {  
        $orders = Order::orderBy('dtVenda', 'DESC')->get(); 
        $order = Order::where(function($query) {            
            $query
            ->where('dtVenda', '>=', date('Y-m-d') . ' 00:00:00')
            ->where('dtVenda', '<=', date('Y-m-d') . ' 23:59:59');    
        })->get(); 
        $order = count($order); 
        $pendentes = Order::where('enviado', 1)->get();
        $pendentes = count($pendentes);
        
        return response()->json(['orders' => $orders, 'total_pedido_dia' => $order, 'pendentes' => $pendentes]);
    }
}
