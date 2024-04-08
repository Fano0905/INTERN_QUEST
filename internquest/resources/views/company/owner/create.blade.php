@extends('layout')

@section('content')
<div id="insert_dialog" class="fixed inset-0 m-auto w-100 h-110  bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="w-full p-10 flex flex-col items-center">
        <h2 class="text-2xl text-blue-600 mb-6">Assigner Entreprise</h2>
        <form action="{{route('owners.store')}}" method="POST" class=w-full>
            @csrf
            <div class="relative mb-6">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Entreprise</label>
                <select type="number" name="company_id" id="company_id" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" @if ($loop->first) selected @endif>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>                
                @error('company_id')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="relative mb-6">
                <label class="absolute left-2 -top-6 text-base text-gray-700 font-medium transition-all">Propriétaire</label>
                <select name="user_id" id="user_id" required class="w-full pl-7 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                    @foreach ($owners as $owner)
                        <option @if ($loop->first) selected @endif value="{{$owner->id}}" data-name="{{ $owner->username }}" title="{{ $owner->username }}">{{ $owner->fname }}, {{ $owner->lname }}</option>
                    @endforeach
                </select>
                <span>
                    @error('user_id')
                        <p style="color: red;">{{$message}}</p>
                    @enderror
                </span>
            </div>
        <div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Assigner Entreprise</button>
        </div>
    </form>
    <a href="{{ url()->previous() }}">
        <button class="w-full h-11 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 font-medium">
            Annuler
        </button>
    </a>
</div>
</div>
@endsection()