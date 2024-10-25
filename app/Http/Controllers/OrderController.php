<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }
    public function home(Request $request) {
        $order = null;
    
        if ($request->filled('invoice_number')) {
            $order = Order::where('invoice_number', $request->invoice_number)->first();
        }
    
        return view('home', compact('order'));
    }
    
    public function create() {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'invoice_number' => 'required|unique:orders,invoice_number',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:in_process,on_route,delivered',
            'evidence_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try {
            $data = $request->all();
    
            if ($request->hasFile('evidence_photo')) {
                $data['evidence_photo'] = $request->file('evidence_photo')->store('evidencias', 'public');
            }
    
            Order::create($data);
    
            return redirect()->route('orders.index')->with('success', 'Orden creada correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Hubo un problema al crear la orden: ' . $e->getMessage());
        }
    }
    
    

    public function edit(Order $order) {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order) {
        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    public function destroy(Order $order) {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function archived() {
        $orders = Order::onlyTrashed()->get();
        return view('orders.archived', compact('orders'));
    }

    public function restore($id) {
        Order::withTrashed()->find($id)->restore();
        return redirect()->route('orders.archived');
    }

    public function search(Request $request) {
        $order = null;

        if ($request->has('invoice_number')) {
            $order = Order::where('invoice_number', $request->invoice_number)->first();
        }

        return view('home', compact('order'));
    }
}
