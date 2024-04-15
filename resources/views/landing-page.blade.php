<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Agro Edu</title>
</head>
<body class="s">
    <div class="">
        <div class="mx-auto max-w-7xl">
            <div class="relative isolate overflow-hidden  px-6 pt-16  sm:px-16 md:pt-24 lg:flex lg:gap-x-1 lg:px-24 lg:pt-0">
                <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Selamat Datang<br>di Agro Edu.</h2>
                    <p class="mt-6 text-lg leading-8 text-slate-700">Sistem Informasi Platform Edukasi Daring Bidang Pertanian Berbasis Website</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                        <a href="/login-page" class="rounded-md bg-slate-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white hover:scale-110 hover:shadow-2xl transition">Masuk</a>
                        <a href="/register-page" class="text-sm font-semibold leading-6 text-slate-900">Daftar <span aria-hidden="true">→</span></a>
                    </div>
                </div>
                <div class="relative mt-16 h-80 lg:mt-8">
                    <img class="absolute left-0 top-0 w-[57rem] max-w-none rounded-md bg-white/5 ring-1 ring-white/10" src="{{ asset('storage/dashboard-gov.jpg') }}" alt="App screenshot" width="auto" height="1080">
                </div>
            </div>
        </div>
    </div>    
    <div class="w-full h-auto font-poppins mt-20 flex flex-col justify-center items-center">
        <h1 class="text-center font-bold text-3xl bg-clip-text text-transparent bg-gradient-to-r from-pink-800 to-violet-800">Ayo Cek Modul Kita <br>yang Paling Sering Dikunjugi!</h1>
        <div class="grid grid-cols-2 gap-x-20 gap-y-4 mt-12">
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
            <a href="#" class="relative group h-40 w-80 rounded-xl overflow-hidden hover:scale-90 transition-all border-2 shadow-md">
                <div class="absolute flex items-center text-2xl font-bold justify-center h-full w-full bg-cover bg-center group-hover:scale-175 transition-all" >
                    Modul 1
                </div>
            </a>
        </div>
    </div> 
    <div class="flex justify-center">
        <div class="flex items-center w-[1000px] mt-14 font-poppins">
            <div>
                <h1 class="text-2xl font-bold mb-2">Berita Terkini di Dunia Agroindustri</h1>
                <p class="w-3/4 text-base font-semibold">Wujudkan Ketahanan Pangan, Pemprov Kalteng Bangun Rice Milling Unit <br>
                <span class="font-normal">Wakil Gubernur Kalimantan Tengah (Kalteng) Edy Pratowo bersama Dirjen Perkebunan Kementerian Pertanian RI (Kementan) Andi Nur Alamsyah melakukan Peletakan Batu Pertama atau Pembangunan Rice Milling Unit dan Rice to Rice. Rice Milling unit itu terletak di Desa Pantik, Kecamatan Pandih Batu, Kabupaten Pulang Pisau.</span>
                </p>
            </div>
            <div class="flex flex-col justify-center items-center h-full">
                <a class="border hover:scale-90 transition h-48 w-48 rounded-lg" target="_blank" href="https://www.php.net/manual/en/control-structures.match.ph" style="background: url('{{ asset('storage/dummy.jpeg') }}'); background-repeat: no-repeat; background-size: cover;">
                </a>
                <a target="_blank" href="https://www.php.net/manual/en/control-structures.match.php">Selengkapnya</a>
            </div>
        </div>
    </div>  
    <div class="flex justify-center items-center mt-20 h-16 font-poppins tracking-wide font-bold bg-[#D6E8EE]">
        ©2024 AgroEdu
    </div>
</body>
</html>
