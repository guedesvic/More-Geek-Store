@extends('layouts.default')

@section('content')
    <section class="text-gray-600">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-2/4 w-full mx-auto overflow-auto">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">Editar produto:</h1>
                </div>

                <form enctype="multipart/form-data" method="POST" action="{{route('admin.products.update', $product->id)}}">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Nome do produto</label>
                                <input type="text" id="name" name="name" value="{{old('name', $product->name)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('name')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Preço</label>
                                <input type="text" id="price" name="price" value="{{old('price', $product->price)}}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('price')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Estoque</label>
                                <input type="text" id="stock" name="stock" value="{{old('stock', $product->stock)}}"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('stock')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Imagem de capa</label>
                                <input type="file" id="cover" name="cover"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                            </div>
                            @error('cover')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        @if($product->cover)
                            <div class="p-2 w-1/2">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">Pre visualizacao</label>
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($product->cover)}}" alt="" class="rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 py-1 px-3 leading-8 ease-in-out">
                                    <a href="{{route('admin.products.destroyImage', $product->id)}}" class="text-sm text-gray-600">Deletar Imagem</a>
                                </div>
                            </div>
                        @endif

                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">Descrição</label>
                                <textarea
                                    id="description" name="description"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-lime-500 focus:bg-white focus:ring-2 focus:ring-lime-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('description', $product->description)}}</textarea>
                            </div>
                            @error('description')
                                <div class="text-red-400 text-sm">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="p-2 w-full">
                            <button type="submit" class="flex ml-auto text-white bg-lime-500 border-0 py-2 px-6 focus:outline-none hover:bg-lime-600 rounded">Adicionar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
