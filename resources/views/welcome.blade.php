<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 overflow-x-hidden">
    <div class="fixed top-[-5%] right-[-5%] w-[600px] h-[600px] bg-purple-400/60 rounded-full blur-[130px] -z-10"></div>
    <div class="fixed bottom-[-10%] left-[-5%] w-[450px] h-[450px] bg-indigo-300/40 rounded-full blur-[110px] -z-10"></div>
    <div class="fixed inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-50 via-blue-100 to-blue-200 -z-20"></div>

    <nav class="bg-indigo-600/95 backdrop-blur-md p-4 shadow-lg sticky top-0 z-50 text-white">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="font-bold text-xl tracking-tight">AmikomEventHub</div>
            <div class="space-x-6 font-semibold">
                <a href="/" class="text-indigo-200 border-b-2 border-indigo-200">Home</a>
                <a href="/profil" class="hover:text-indigo-200">Profil</a>
                <a href="/katalog" class="hover:text-indigo-200">Katalog</a>
                <a href="/kontak" class="hover:text-indigo-200">Kontak</a>
                <a href="/bantuan" class="hover:text-indigo-200">Bantuan</a>
            </div>
        </div>
    </nav>

    <div class="relative flex items-center justify-center min-h-[calc(100vh-80px)] z-10 p-6">
        <div class="text-center p-10 bg-white/60 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/40 max-w-lg mx-4">
            <div class="inline-block px-4 py-1.5 mb-4 text-sm font-bold text-purple-700 uppercase bg-purple-100 rounded-full">Dashboard Utama</div>
            <h1 class="text-4xl font-extrabold text-slate-900 mb-4">Selamat Datang!</h1>
            <p class="text-slate-600 mb-8 leading-relaxed">Gunakan navbar di atas untuk berpindah antar halaman dengan mudah.</p>
            <div class="grid grid-cols-2 gap-4">
                <a href="/profil" class="bg-indigo-600 text-white p-4 rounded-xl hover:bg-indigo-700 shadow-lg transition-all font-bold">Ke Profil</a>
                <a href="/katalog" class="bg-white text-indigo-600 border-2 border-indigo-600 p-4 rounded-xl hover:bg-indigo-50 transition-all font-bold">Ke Katalog</a>
            </div>
        </div>
    </div>
</body>
</html>