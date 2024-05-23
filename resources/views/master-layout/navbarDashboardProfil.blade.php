<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily{
          Poppins: ["Poppins", "sans-serif"]
        }
      }
    }
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <title>Agro Edu | @yield('title')</title>
  <style>
    input[type="file"]::file-selector-button {
      margin: 0px 10px 0px 0px;
      border: 2px solid #1D46A6;
      padding: 5px 20px;
      border-radius: 25px;
      background-color: #1D46A6;
      transition: 0.1s;
    }
    input[type="file"]::file-selector-button:hover {
      background-color: #1D46A6;
      text-decoration: underline;
      transition: 0.1s;
    } 
    input[type="file"]::file-selector-button:active {
      background-color: #163682;
      transition: 0.1s;
    }
    .file-input-wrapper {
      position: relative;
    }
    .file-input {
      display: none;
    }
    .file-input-label {
      display: inline-block;
      margin: 0px 10px 0px 0px;
      border: 2px solid #1D46A6;
      padding: 5px 20px;
      border-radius: 25px;
      background-color: #1D46A6;
      color: white;
      cursor: pointer;
      transition: 0.1s;
    }
    .file-input-label:hover {
      background-color: #1D46A6;
      text-decoration: underline;
      transition: 0.1s;
    } 
    .file-input-label:active {
      background-color: #163682;
      transition: 0.1s;
    }
  </style>
</head>

<body class="font-Poppins bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
        <img class="w-8 h-8 rounded-full" src="{{ url('assets/img/logo.png') }}" alt="logo">
        @if (Auth::user()->roles_id == 2)
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/user/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/bahan-ajar">Bahan Ajar</a>
        @elseif (Auth::user()->roles_id == 3)
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/modul">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/gov/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/bahan-ajar">Bahan Ajar</a>
        @else
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/modul">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/admin/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="/detail-bahan-ajar">Bahan Ajar</a>
        @endif
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, {{ Auth::user()->nama }}</span>
          <a class="group" href="/profil">
            @if (Auth::user()->foto_profil != null)
            <img class="bg-white w-8 h-8 rounded-full" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }} " alt="profil-pic">
            @else
            <img class="bg-white w-8  h-8 rounded-full" src="{{ url('assets/img/anon-pic.png') }}" alt="profil-pic">
            @endif
            <hr class="mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
    <div class="bg-[#7FC7D9] rounded px-8 py-[22px]">
      <div class="grid grid-rows-[240px_200px] gap-y-9">
        <div class="flex flex-col justify-center">
          @if (Auth::user()->foto_profil != null)
          <img class="self-center bg-white w-32 h-32 rounded-full" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }}" alt="profile-pic">
          @else
          <img class="self-center bg-white w-32 h-32 rounded-full" src="{{ url('assets/img/anon-pic.png') }}" alt="profile-pic">
          @endif
          <span class="self-center mt-4 text-2xl font-semibold sm:text-base whitespace-nowrap text-black">{{ Auth::user()->nama }}</span>
          <hr class="self-center my-2 w-24 border border-black rounded">
          @if (Auth::user()->roles_id == 1)
          <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Admin</span>
          @elseif (Auth::user()->roles_id == 2)
          <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Pengguna</span>
          @else
          <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Pemerintah</span>
          @endif
        </div>
        @if (Auth::user()->roles_id == 1)
        <div class="flex flex-col font-semibold pt-3 text-base gap-y-2 justify-center">
          <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl"><a href="/lihat-gov">Akun Pemerintah</a></button>
          <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl"><a href="/lihat-user">Akun Pengguna</a></button>
          <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl"><a href="{{ route('edit.profil', $currentuser->id) }}">Edit</a></button>
          <button class="bg-[#FF0000] w-[140px] h-[60px] justify-center self-center rounded-xl text-white"><a href="/logout">Logout</a></button>
        </div>
        @else
        <div class="flex flex-col font-semibold pt-20 text-base gap-y-2 justify-center">
          <button class="bg-[#D6E8EE] w-[140px] h-[40px] justify-center self-center rounded-xl"><a href="{{ route('edit.profil', $currentuser->id) }}">Edit</a></button>
          <button class="bg-[#FF0000] w-[140px] h-[40px] justify-center self-center rounded-xl text-white"><a href="/logout">Logout</a></button>
        </div>
        @endif
      </div>
    </div>

  @yield('content')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>