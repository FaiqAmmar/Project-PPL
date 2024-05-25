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
      padding: 5px 20px;
      border-radius: 25px;
      background-color: #48B477;
      transition: 0.1s;
    }
    input[type="file"]::file-selector-button:hover {
      background-color: #48B477;
      text-decoration: underline;
      transition: 0.1s;
    } 
    input[type="file"]::file-selector-button:active {
      background-color: #39905f;
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
      padding: 5px 32px;
      border-radius: 25px;
      background-color: #48B477;
      color: white;
      cursor: pointer;
      transition: 0.1s;
    }
    .file-input-label:hover {
      background-color: #39905f;
      transition: 0.1s;
    } 
    .file-input-label:active {
      background-color: #39905f;
      transition: 0.1s;
    }
  </style>
</head>

<body class="font-Poppins bg-[#F5F5F5]">

  <nav class="top-0 w-full bg-[#F5F5F5] drop-shadow-[0px_2px_4px_rgba(0,0,0,0.25)]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
        <img class="w-8 h-8 rounded-full" src="{{ url('assets/img/logo.png') }}" alt="logo">
        @if (Auth::user()->roles_id == 2)
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all" href="/user/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all" href="/bahan-ajar">Bahan Ajar</a>
        @elseif (Auth::user()->roles_id == 3)
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/modul">Modul</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/gov/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/bahan-ajar">Bahan Ajar</a>
        @else
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/modul">Modul</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/admin/edukasi/">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/detail-bahan-ajar">Bahan Ajar</a>
        @endif
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, {{ Auth::user()->nama }}</span>
          <a class="group" href="/profil">
            @if (Auth::user()->foto_profil != null)
            <img class="bg-white w-8 h-8 rounded-full" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }} " alt="profil-pic">
            @else
            <img class="bg-white w-8 h-8 rounded-full" src="{{ url('assets/img/anon-pic.png') }}" alt="profil-pic">
            @endif
            <hr class="mt-2 border border-[#48B477] rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
    <div class="bg-[#48B477] rounded px-8 pt-2 pb-4">
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
          <a href="/lihat-gov" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
          hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Akun Pemerintah</a>
          <a href="/lihat-user" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
          hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Akun Pengguna</a>
          <a href="{{ route('edit.profil', $currentuser->id) }}" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
          hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Edit</a>
          <a href="/logout" class="flex bg-[#FF0000] w-[150px] h-[60px] justify-center items-center self-center rounded-xl text-white
          hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Logout</a>
        </div>
        @else
        <div class="flex flex-col font-semibold pt-20 text-base gap-y-2 justify-center">
          <a href="{{ route('edit.profil', $currentuser->id) }}" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
            hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Edit</a>
          <a href="/logout" class="flex bg-[#FF0000] w-[150px] h-[60px] justify-center items-center self-center rounded-xl text-white
          hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Logout</a>
        </div>
        @endif
      </div>
    </div>

  @yield('content')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>