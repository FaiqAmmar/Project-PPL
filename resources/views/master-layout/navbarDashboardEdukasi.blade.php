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
    /* Star rating labels */
    .star-label {
      font-size: 24px;
      color: #D1D5DB; /* Gray star color */
      cursor: pointer;
    }

    /* Hide default radio buttons */
    input[type="radio"].hidden {
      position: absolute;
      visibility: hidden;
    }

    /* Hover state for stars */
    .star-label:hover,
    .star-label:hover ~ .star-label {
      color: #EAB308; /* Yellow star color */
    }

    /* Checked state for stars */
    input[type="radio"]:checked ~ label,
    input[type="radio"]:checked ~ label ~ label {
      color: #EAB308; /* Yellow star color */
    }

    .custom-file-input {
      display: none;
    }

    .custom-file-label {
      display: inline-block;
      padding: 6px 20px;
      font-weight: semibold;
      border: 1px solid black;
      background-color: #FFFFFF;
      color: #9CA3AF;
      border-radius: 12px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-file-label:hover {
      background-color: #39905f;
      color: #FFFFFF;
    }

    /* Form field styles */
    .form-field {
      margin-bottom: 1rem;
    }
    .form-field label {
      font-weight: semibold;
      display: block;
    }
    .form-field input[type="text"],
    .form-field textarea {
      width: 100%;
      padding: 8px;
      border: 2px solid #48B477;
      border-radius: 8px;
      outline: none;
      transition: border-color 0.3s ease;
  }
    .form-field input[type="text"]:focus,
    .form-field textarea:focus {
      border-color: #39905f;
    }
    /* width */
    #scrollbar::-webkit-scrollbar {
      width: 5px;
    }
  
    /* Track */
    #scrollbar::-webkit-scrollbar-track {
      background: #9D9D9D;
      border-radius: 10px;
    }
  
    /* Handle */
    #scrollbar::-webkit-scrollbar-thumb {
      background: black; 
      border-radius: 10px;
    }

      /* height */
    #scrollbar-under::-webkit-scrollbar {
      height: 5px;
    }
    /* Track */
    #scrollbar-under::-webkit-scrollbar-track {
      background: #9D9D9D;
      border-radius: 10px;
    }
    /* Handle */
    #scrollbar-under::-webkit-scrollbar-thumb {
      background: black; 
      border-radius: 10px;
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
          underline underline-offset-8 text-[#48B477]" href="/edukasi/2/1">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all" href="/bahan-ajar">Bahan Ajar</a>
        @elseif (Auth::user()->roles_id == 3)
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477]" href="/modul">Modul</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          underline underline-offset-8 text-[#48B477]" href="/edukasi/2/1">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/konsultasi">Konsultasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          hover:underline underline-offset-8 text-black hover:text-[#48B477] transition-all duration-150" href="/bahan-ajar">Bahan Ajar</a>
        @else
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap
          hover:underline underline-offset-8 text-black hover:text-[#48B477]" href="/modul">Modul</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap 
          underline underline-offset-8 text-[#48B477]" href="/edukasi/2/1">Edukasi</a>
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
            <img class="bg-white w-8 h-8 rounded-full object-cover" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }} " alt="profil-pic">
            @else
            <img class="bg-white w-8 h-8 rounded-full object-cover" src="{{ url('assets/img/anon-pic.png') }}" alt="profil-pic">
            @endif
            <hr class="mt-2 opacity-0 group-hover:opacity-100 border border-[#48B477] rounded transition-all duration-100">
          </a>
        </div>
      </div>
    </div>
  </nav>

  @yield('content')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>