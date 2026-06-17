<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-900 to-indigo-800 px-8 py-12 text-center">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-indigo-900 font-bold text-2xl shadow-lg">
                    AH
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">AmikomEventHub</h1>
                <p class="text-indigo-200 text-sm">Admin Dashboard Login</p>
            </div>

            <!-- Form -->
            <div class="px-8 py-10">
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <p class="text-red-800 text-sm font-medium">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $errors->first('email') }}
                        </p>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="admin@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-bold py-3 rounded-xl hover:shadow-lg transition duration-200 mt-8">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-slate-600 text-sm mt-6">
            <a href="/" class="text-indigo-600 font-bold hover:text-indigo-700">Kembali ke Home</a>
        </p>
    </div>
</body>
</html>
