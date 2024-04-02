@extends('base')
@section('title', 'Login')

@section('content')
<div id="login" class="fixed inset-0 m-auto w-100 h-100 bg-transparent border-2 border-white border-opacity-50 rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden">
    <div class="w-full p-10 flex flex-col items-center">
        <h2 class="text-4xl text-blue-600 mb-6">Login</h2>
        <form action="{{route('auth.login')}}" class="w-full" method="POST">
            @csrf
            <div class="relative mb-6">
                <ion-icon name="mail" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <input type="email" name="mail" id="mail" required placeholder="" class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">mail</label>
            @error('mail')
                <p style="color: red">{{$message}}</p>
            @enderror
            </div>
            <div class="relative mb-6">
                <ion-icon name="lock-closed" class="absolute text-gray-700 text-lg left-2 top-1/2 transform -translate-y-1/2"></ion-icon>
                <input type="password" name="password" id="password" required placeholder=" " class="w-full pl-10 pr-3 py-1 bg-transparent border-b-2 border-blue-600 outline-none focus:border-blue-400">
                <label class="absolute left-2 -top-4 text-base text-gray-700 font-medium transition-all">Mot de passe</label>
                @error('password')
                    <p style="color: red;">{{$message}}</p>
                @enderror
            </div>
            <div class="flex justify-between items-center mb-4">
                <label class="flex items-center text-base text-gray-700 font-medium">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 mr-2">Remember me
                </label>
                <a href="#" class="text-sm text-gray-700 hover:underline mx-3">forgot password</a>
            </div>
            <button type="submit" class="w-full h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 font-medium">Login</button>
            <div class="text-center text-sm text-gray-700 mt-4">
                I don't have account<a href="{{route('users.create')}}" class="font-bold hover:underline">S'enregistrer</a>
            </div> 
        </form>
    </div>
</div>
@endsection
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>