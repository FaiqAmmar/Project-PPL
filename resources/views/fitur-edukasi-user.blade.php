<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Modul (Government)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="output.css">
</head>
<body class="bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
        <img class="w-8 h-8 rounded-full" src="{{ asset('storage/logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="#">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="#">Konsultasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang,(Nama Akun)</span>
          <a class="group" href="#">
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/logo-test.png') }}" alt="profile-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="mx-4 mt-4 mb-4 rounded bg-[#7FC7D9] items-center justify-between p-2">
    <div class="grid grid-cols-[95%_5%]">
      <a href="#">
        <ul class="list-none grid grid-cols-11 gap-x-2 font-semibold">
          <li class="bg-[#D6E8EE] rounded-xl text-center">Modul #1</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #2</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #3</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #4</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #5</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #6</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #7</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #8</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #9</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #10</li>
          <li class="hover:bg-[#D6E8EE] rounded-xl text-center">Modul #11</li>
        </ul>
      </a>
      <button class=""></button>
    </div> 
  </div>

  <div class="mx-4 mt-4 mb-4 grid grid-cols-[17%_auto] gap-x-4">
    <div class="bg-[#D6E8EE] rounded py-3 pl-4 flex flex-col">
      <span class="text-xl font-semibold">Materi #1</span>
        <ul class="text-base mb-2">
          <li class="flex flex-row underline"><a href="#">
            Sub Materi #1</a>
            <a href="#"><button><img  class=" ml-16 h-[24px]" src="{{ asset('storage/tombol-download.png') }}" alt="tombol-download"></button></a>
          </li>
          <li class="hover:underline"><a href="#">Sub Materi #2</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #3</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #4</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #5</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #6</a></li>
        </ul>
      <span class="text-xl font-semibold mb-2">Materi #2</span>
      <span class="text-xl font-semibold mb-2">Materi #3</span>
      <span class="text-xl font-semibold mb-2">Materi #4</span>
    </div>
    <div class="bg-[#D6E8EE] rounded p-4">
      tes 
    </div>
  </div>

</body>
</html>