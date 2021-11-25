<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Welcome {{$user->name}},</p><br>
                    <p>On this page you can change your settings. <br> Below you will find your information with buttons to change your information.</p>
                </div>

                <form action="{{route('settings.update', $user)}}" name="change-information-user" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-4 bg-white ">
                        <label for="name">Name</label><br>
                        <input id="name" type="text" name="name" value="{{$user->name}}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name" required="">
                    </div>
                    <div class="p-4 bg-white">
                        <label for="email">Email</label><br>
                        <input id="email" type="email" name="email" value="{{$user->email}}"  class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Email" required="">
                    </div>
                    <input type="submit" value="Change information" name="send" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
