<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tax;

class TaxesController extends Controller
{
    function index()
    {
        $taxes = Tax::all();

        return view('taxes.index', compact('taxes'));
    }

    function edit($id)
    {
        $tax = Tax::findOrFail($id);

        return view('taxes.edit', compact('tax'));
    }

    function update(Request $request, $id)
    {
        Tax::whereId($id)
            ->update($request->only('currency', 'value'));

        return redirect()->route('taxes.index');
    }
}
