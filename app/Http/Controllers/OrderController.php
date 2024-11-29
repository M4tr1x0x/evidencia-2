<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Mostrar todas las órdenes (para Warehouse)
    public function index()
    {
        $orders = Order::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }
    
    // Crear una nueva orden (para Sales)
    public function create()
    {
        return view('orders.create');
    }

    // Guardar una nueva orden (para Sales)
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|unique:orders,invoice_number',
            'customer_name' => 'required|string',
            'customer_number' => 'required|unique:orders,customer_number',
            'fiscal_data' => 'required|string',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Order::create([
            'invoice_number' => $request->invoice_number,
            'customer_name' => $request->customer_name,
            'customer_number' => $request->customer_number,
            'fiscal_data' => $request->fiscal_data,
            'delivery_address' => $request->delivery_address,
            'notes' => $request->notes,
            'status' => 'Ordered',
            'order_date' => now(),
        ]);

        return redirect()->route('orders.index')->with('success', 'Orden creada exitosamente.');
    }

    // Cambiar el estado a "In Process" (para Warehouse)
    public function process($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'In Process']);

        return redirect()->route('orders.index')->with('success', 'Estado cambiado a "En Proceso".');
    }

    // Subir foto de la carga o entrega (para Route)
    public function uploadPhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $order = Order::findOrFail($id);
    
        if ($order->status === 'In Route') {
            $photoPath = $request->file('photo')->store('evidences', 'public');
            $order->update(['route_photo' => $photoPath]);
            return back()->with('success', 'Foto de la carga subida correctamente.');
        } elseif ($order->status === 'Delivered') {
            $photoPath = $request->file('photo')->store('evidences', 'public');
            $order->update(['delivery_photo' => $photoPath]);
            return back()->with('success', 'Foto de la entrega subida correctamente.');
        }
    
        return back()->with('error', 'No se puede subir la foto en este estado.');
    }
    

    // Restaurar una orden eliminada (para todos los roles)
    public function restore($id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->restore();

        return redirect()->route('orders.archived')->with('success', 'Orden restaurada correctamente.');
    }
    public function update(Request $request, $id)
    {
        // Validar los datos enviados
        $request->validate([
            'status' => 'required|string|in:Ordered,In Process,In Route,Delivered',
        ]);

        // Encontrar la orden por ID
        $order = Order::findOrFail($id);

        // Actualizar los datos de la orden
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Orden actualizada exitosamente.');
    }


    // Ver órdenes archivadas (para todos los roles)
    public function archived()
    {
        $orders = Order::onlyTrashed()->get(); // Solo las órdenes eliminadas
        return view('orders.archived', compact('orders'));
    }    

    public function edit($id)
    {
        $order = Order::findOrFail($id); // Encuentra la orden por ID o lanza un error 404
        return view('orders.edit', compact('order')); // Retorna la vista de edición con la orden
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete(); // Esto manejará automáticamente el campo 'deleted_at'
        return redirect()->route('orders.index')->with('success', 'Orden eliminada exitosamente.');
    }

}

