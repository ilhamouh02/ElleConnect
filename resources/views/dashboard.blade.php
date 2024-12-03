@extends('layouts.app')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}


        </h2>
    @endsection
    @section('content')

    @if(auth()->user()->isComptable())
        
        
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ea suscipit voluptatum ipsum temporibus quaerat eos provident natus nesciunt, nihil enim architecto sequi vero corporis culpa, possimus aspernatur repudiandae omnis cum obcaecati a quam? Odio eligendi officiis voluptatem ratione, aspernatur iste repudiandae veritatis voluptates nesciunt, dolorum itaque quia aliquam! Praesentium.</p>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @endsection

