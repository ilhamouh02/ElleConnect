<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\Prise;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $statuses = Status::all();
        
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        //dd($users->toArray());
        $prises = Prise::all();
        return view('orders.create', compact('statuses', 'paymentMethods', 'users', 'prises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        
            'date_Commande' => 'required|date',
            'date_Paiement' => 'required|date',
            'date_Livraison' => 'required|date',
            'id_Connexion' => 'required|string',
            'password_Connexion' => 'required|string',
            //'id_Status' => 'required|exists:status,id_Status',
            'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
            'id_utilisateur' => 'required|exists:users,id',
            'id_Prise' => 'nullable|exists:prises,id_Prise',
        ]);
        $validated ["id_demande"] = "Demande10";
        Order::create(attributes: $validated);
        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès');
    }
   
    
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statuses = Status::all();
        $paymentMethods = PaymentMethod::all();
        $users = User::all();
        $prises = Prise::all();
        return view('orders.edit', compact('order', 'statuses', 'paymentMethods', 'users', 'prises'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'date_Commande' => 'required|date',
        'date_Paiement' => 'required|date',
        'date_Livraison' => 'required|date',
        'id_Connexion' => 'required|string',
        'password_Connexion' => 'required|string',
        'id_Status' => 'required|exists:status,id_Status',
        'id_Paiement' => 'nullable|exists:payment_methods,id_Paiement',
        'id_utilisateur' => 'required|exists:users,id_utilisateur',
        'id_Prise' => 'nullable|exists:prises,id_Prise',
    ]);

    $order = Order::findOrFail($id);
    $order->update($validated);
    return redirect()->route('orders.index')->with('success', 'Commande mise à jour avec succès');
}

    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();
    return redirect()->route('orders.index')->with('success', 'Commande supprimée avec succès');
}
}