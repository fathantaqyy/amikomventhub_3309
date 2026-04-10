<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Katalog - AmikomEventHub</title>
</head>
<body class="min-h-screen bg-slate-100">
    <div class="fixed top-[-5%] right-[-5%] w-[600px] h-[600px] bg-purple-400/60 rounded-full blur-[130px] -z-10"></div>
    <div class="fixed inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-50 via-blue-100 to-blue-200 -z-20"></div>

    <nav class="bg-indigo-600/95 backdrop-blur-md p-4 shadow-lg sticky top-0 z-50 text-white">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="font-bold text-xl tracking-tight">AmikomEventHub</div>
            <div class="space-x-6 font-semibold">
                <a href="/" class="hover:text-indigo-200">Home</a>
                <a href="/profil" class="hover:text-indigo-200">Profil</a>
                <a href="/katalog" class="text-indigo-200 border-b-2 border-indigo-200">Katalog</a>
                <a href="/kontak" class="hover:text-indigo-200">Kontak</a>
                <a href="/bantuan" class="hover:text-indigo-200">Bantuan</a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto p-10 relative z-10">
        <h1 class="text-4xl font-black text-slate-800 mb-10 text-center">Katalog Event</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white/70 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/50 border-l-8 border-l-indigo-600">
                <h2 class="text-2xl font-bold text-slate-800 mb-2">Webinar Digital Bisnis</h2>
                <p class="text-slate-600 mb-6">Belajar strategi marketing di era AI.</p>
                <span class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full font-bold text-sm">Coming Soon</span>
            </div>
            <div class="bg-white/70 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/50 border-l-8 border-l-emerald-500">
                <h2 class="text-2xl font-bold text-slate-800 mb-2">Workshop Laravel</h2>
                <p class="text-slate-600 mb-6">Membangun aplikasi web dari nol.</p>
                <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 rounded-full font-bold text-sm">Free</span>
            </div>
        </div>
    </div>
</body>
</html>