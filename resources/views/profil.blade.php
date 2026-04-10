<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Profil - AmikomEventHub</title>
</head>
<body class="min-h-screen bg-slate-100 overflow-x-hidden">
    <div class="fixed top-[-5%] right-[-5%] w-[600px] h-[600px] bg-purple-400/60 rounded-full blur-[130px] -z-10"></div>
    <div class="fixed inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-50 via-blue-100 to-blue-200 -z-20"></div>

    <nav class="bg-indigo-600/95 backdrop-blur-md p-4 shadow-lg sticky top-0 z-50 text-white">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="font-bold text-xl tracking-tight">AmikomEventHub</div>
            <div class="space-x-6 font-semibold">
                <a href="/" class="hover:text-indigo-200">Home</a>
                <a href="/profil" class="text-indigo-200 border-b-2 border-indigo-200">Profil</a>
                <a href="/katalog" class="hover:text-indigo-200">Katalog</a>
                <a href="/kontak" class="hover:text-indigo-200">Kontak</a>
                <a href="/bantuan" class="hover:text-indigo-200">Bantuan</a>
            </div>
        </div>
    </nav>

    <div class="relative flex items-center justify-center min-h-[calc(100vh-80px)] z-10 p-6">
        <div class="bg-white/60 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-white/40 text-center max-w-md w-full">
            <div class="w-24 h-24 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg text-3xl font-bold">FT</div>
            <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Profil Praktikan</h1>
            <div class="text-slate-600 mb-8 space-y-1">
                <p class="font-bold text-indigo-700 text-lg">Fathan Tamim</p>
                <p class="font-medium">24.12.3309</p>
                <p>S1 Sistem Informasi</p>
            </div>
            <a href="/katalog" class="block w-full bg-indigo-600 text-white font-bold py-3 rounded-xl hover:bg-indigo-700 transition">Lihat Katalog Event</a>
        </div>
    </div>
</body>
</html>