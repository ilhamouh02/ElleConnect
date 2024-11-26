@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Détails du Produit</h1>

    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p><strong>Description : </strong>{{ $product->description }}</p>
            <p><strong>Prix : </strong>{{ $product->price }} €</p>
            <p><strong>Stock : </strong>{{ $product->stock }}</p>
