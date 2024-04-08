@extends('layout')

@section('content')
    <div class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden" style="backdrop-filter: blur(20px);">
        <div class="w-full p-10 flex flex-col items-center">
            <h2 class="text-2xl text-blue-600 mb-6">Modifier une promo</h2>
            <form action="{{route('promos.update', $promo->id)}}" method="POST" class = w-full>
                @csrf
                @method('PUT')
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Nom</label>
                    <input type="text" name="name" id="name" required placeholder="Nom promo" value="{{$promo->name}}" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @error('name')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Pilote assigné</label>
                    <select type="number" name="pilote_id" id="pilote_id" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @foreach ($pilotes as $pilote)
                            <option value="{{ $pilote->id }}" @if ($loop->first) selected @endif>{{ $pilote->username }}</option>
                        @endforeach
                    </select>
                    @error('pilote_id')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="relative mb-6">
                    <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Centre</label>
                    <select name="centre" id="centre" class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                        @foreach ($centres as $centre)
                            <option value="{{$centre}}">{{$centre}}</option>
                        @endforeach
                    </select>
                    @error('centre')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>
            <div>
                <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Modifier la promo</button>
                <a href="{{ url()->previous() }}">
                    <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
                        Annuler
                    </button>
                </a>
            </div>
        </form>
    </div>
    <script>
        document.getElementById("centre").addEventListener("input", function() {
        this.value = this.value.toUpperCase();
    });
    </script>
@endsection
