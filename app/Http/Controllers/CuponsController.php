<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cupom;

class CuponsController extends Controller
{
  
    public function index()
    {        
        $cupons = Cupom::all();
        return view('cupons.index', compact('cupons'));
    }
    
    public function create()
    {
        return view('cupons.create');
    }

    public function edit($id)
    {  
        $cupom = Cupom::findOrFail($id);        

        return view('cupons.edit', compact('cupom'));
    }

    public function store(Request $request)
    {  
        Cupom::create([
            'cupom' => $request->cupom,
            'porcentagem' => $request->porcentagem,
            'data_fim' => $request->data_fim
        ]);

        return redirect()->route('cupons.index');
    }

    public function update(Request $request, $id)
    {
        Cupom::findOrFail($id)->update([
            'cupom' => $request->cupom,
            'porcentagem' => $request->porcentagem,
            'data_fim' => $request->data_fim
        ]);

        return redirect()->route('cupons.index');

    }

    public function destroy($id)
    {
        Cupom::findOrFail($id)->delete();
        return redirect()->route('cupons.index');
    }
   
}
