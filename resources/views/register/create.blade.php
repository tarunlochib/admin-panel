<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>

    <nav>
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="admin panel logo" width="165" height="16">
            </a>
        </div>
    </nav>

    <div class="flex items-center justify-center min-h-screen bg-gray-100 ">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Register</h3>
            <form method="POST" action="/register">
                @csrf
                <div class="mt-4">
                    <div>
                        <label class="block" for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Name"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    value="{{ old('name') }}" required>

                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Email"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    value="{{ old('name') }}" required>

                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password"
                                    class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" required>
                                    
                                    @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                    </div>
                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" type="submit">Create
                            Account</button>
                    </div>
                    <div class="mt-6 text-grey-dark">
                        Already have an account?
                        <a class="text-blue-600 hover:underline" href="#">
                            Log in
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>