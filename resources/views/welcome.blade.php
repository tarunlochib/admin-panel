<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

        <nav class="md:flex md:justify-between md:items-center m-8">
            
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="admin panel logo" width="165" height="16">
                </a>
            </div>
           
            <div class="mt-12 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">welcome, {{ auth()->user()->name }}</span>

                    <form method="POST" action="/logout" class="font-semibold text-xs text-blue-500 ml-6">
                        @csrf

                        <button type="submit">Log Out</button>

                    </form>
                @else
                    <a href="/user/create" class="text-xs font-bold uppercase">Register a user</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth
            </div>

        </nav>

        <hr>

        <section class="mx-12">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">S.No.</th>
                      <th class="px-4 py-3">Name</th>
                      <th class="px-4 py-3">Employee Id</th>
                      <th class="px-4 py-3">Email</th>
                      <th class="px-4 py-3">Building no.</th>
                      <th class="px-4 py-3">Street Name</th>
                      <th class="px-4 py-3">City</th>
                      <th class="px-4 py-3">State</th> 
                      <th class="px-4 py-3">Country</th>
                      <th class="px-4 py-3">Pincode</th>
                    </tr>
                  </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3"> {{ $user->id }} </td>
                    <td>
                        <div class="flex items-center text-sm">
                            <div>
                            <p class="font-semibold">{{ $user->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ $user->employee_id }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                        {{ $user->email }}
                    </td>
                    {{-- @foreach($userAddresses as $userAddress) --}}

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->building_no }}
                    </td>

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->street_name }}
                    </td>

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->city }}
                    </td>

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->state }}
                    </td>

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->country }}
                    </td>

                    <td class="px-4 py-3 text-xs">
                        {{ $user->userAddress->pincode }}
                    </td>
                    {{-- @endforeach
                         --}}
                    @endforeach

                </tr>
                </tbody>
            </table>
            

        </section>

        @if(session()->has('success'))
            <div class="fixed  bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    </body>
</html>
