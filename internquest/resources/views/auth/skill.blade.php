@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-xl bg-white p-10 rounded-lg shadow-lg">
        <h2 class="text-2xl text-red-600 mb-6">Ajouter compétence</h2>
        <form action="{{ route('internquest.users.confirm') }}" method="POST" class="w-full">
            @csrf
            <div class="relative mb-2 grid grid-cols-2 gap-4">
                <strong><h2><label class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Compétences</label></h2></strong>
                @foreach ($skills as $skill)
                    <div class="flex items-center">
                        <input type="checkbox" name="skills[]" class="..." value="{{ $skill->id }}"> {{ $skill->name }}
                    </div>
                @endforeach
                @error('skills.*')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mb-2 flex flex-col">
                <label class="absolute left-2 top-0 text-sm text-gray-700 font-medium transition-all">Utilisateur</label>
                <select name="user_id" id="user_id" required class="w-full pl-3 pr-3 py-2 bg-transparent border-b-2 border-red-600 outline-none focus:border-red-400">
                    @foreach ($users as $user)
                        <option @if ($loop->first) selected @endif value="{{ $user->id }}" data-name="{{ $user->username }}" title="{{ $user->username }}">{{ $user->id }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full h-11 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">Ajouter compétence</button>
            </div>
        </form>
        <a href="{{ url()->previous() }}">
            <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
                Annuler
            </button>
        </a>
    </div>
</div>
@endsection
