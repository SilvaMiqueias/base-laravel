<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("Produto") }}
                           <span>{{today()}}</span>
                            @if($products)
                                @foreach( $products as $product)
                                    <h1>{{$product->name}}</h1>
                                @endforeach
                            @endif
                        </div>
                            <form method="POST" action="{{ route('product.store') }}">
                                @csrf
                                <div class="p-6">
                                    <x-input-label for="name" :value="__('Nome')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="p-6">
                                    <label for="description">Descrição</label>
                                    <textarea rows="5" cols="100" name="description" id="description" ></textarea>
                                </div>
                                <div class="p-6">
                                    <x-input-label for="price" :value="__('Preço')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div class="p-6">
                                    <x-primary-button class="ml-4">
                                        {{ __('Salvar') }}
                                    </x-primary-button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
