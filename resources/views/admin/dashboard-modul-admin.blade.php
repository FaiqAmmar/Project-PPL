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
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="dashboard-modul-admin">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="fitur-edukasi-admin">Edukasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Faiq Ammar</span>
          <a class="group" href="profil-admin">
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/admin.jpg') }}" alt="admin-pic">
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
    </div>
  </div>

</body>
</html>