<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        return [
            'idBoleto',
            'Código do Cliente',
            'Código do Produto',
            'Valor ME',
            'Valor MN',
            'Forma MN',
            'Código Forma Entregue Me',
            'Valor Taxa',
            'Id Taxa',
            'Valor Despesa',
            'IOF',
            'Local Entrega',
            'Id Cliente Entrega',
            'Data da Venda',
            'Id Status',
            'Código Agente',
            'Cartão'
        ];
    }
}
