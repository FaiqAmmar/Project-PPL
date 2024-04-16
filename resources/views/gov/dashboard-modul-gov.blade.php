<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Modul</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="output.css">
</head>
<body class="bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="dashboard-modul-gov">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="fitur-edukasi-gov">Edukasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Guntur Cahyadi</span>
          <a class="group" href="profil-gov">
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/gov.jpg') }}" alt="gov-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
    <div class="flex items-center justify-between px-14 pt-8">
      <div class="flex items-center justify-start rtl:justify-end">
        <span class="text-3xl font-semibold">Modul Bahan Ajar</span>
      </div>
      <div class="flex items-center">
        <button class="flex p-2 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
          <img class="w-3 h-3" src="{{ asset('storage/tombol-tambah.png') }}" alt="button">
        </button>
      </div>
    </div>
  </div>

</body>
</html>