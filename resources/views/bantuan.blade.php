<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Bantuan - AmikomEventHub</title>
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
                <a href="/katalog" class="hover:text-indigo-200">Katalog</a>
                <a href="/kontak" class="hover:text-indigo-200">Kontak</a>
                <a href="/bantuan" class="text-indigo-200 border-b-2 border-indigo-200">Bantuan</a>
            </div>
        </div>
    </nav>

    <div class="flex items-center justify-center min-h-[calc(100vh-80px)] p-6">
        <div class="bg-white/60 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-white/40 max-w-2xl w-full">
            <h1 class="text-3xl font-black text-slate-800 mb-8 text-center">FAQ Pusat Bantuan</h1>
            <div class="space-y-4 mb-8">
                <div class="p-5 bg-white/50 rounded-2xl border border-indigo-100">
                    <p class="font-bold text-indigo-800 italic mb-1">Q: Bagaimana cara mendaftar event?</p>
                    <p class="text-slate-600">A: Anda bisa mendaftar melalui menu katalog yang tersedia di dashboard.</p>
                </div>
                <div class="p-5 bg-white/50 rounded-2xl border border-indigo-100">
                    <p class="font-bold text-indigo-800 italic mb-1">Q: Apakah ada sertifikat?</p>
                    <p class="text-slate-600">A: Ya, semua peserta webinar akan mendapatkan e-sertifikat resmi.</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/profil" class="flex-1 text-center py-3 border-2 border-indigo-600 text-indigo-600 font-bold rounded-xl hover:bg-indigo-50 transition">Profil Saya</a>
                <a href="/kontak" class="flex-1 text-center py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 shadow-lg transition">Hubungi CS</a>
            </div>
        </div>
    </div>
</body>
</html>