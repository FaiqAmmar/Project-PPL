<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edukasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="output.css">
</head>
{{-- <style>
#tes
</style> --}}
<body class="bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <img class="w-8 h-8 rounded-full" src="{{ url('logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="dashboard-modul-admin">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="fitur-edukasi-admin">Edukasi</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="#">Konsultasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Faiq Ammar</span>
          <a class="group" href="profil-admin">
            <img class="w-8 h-8 rounded-full" src="{{ url('admin.jpg') }}" alt="admin-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="flex flex-row w-[1231px] h-12 m-4 rounded bg-[#7FC7D9] items-center p-2">
    <div class="flex flex-row w-full items-center">
      <ul class="relative max-w-6xl flex flex-row overflow-x-auto text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" 
      data-tabs-active-classes="" 
      data-tabs-inactive-classes="" 
      role="tablist">
          <li class="me-2" role="presentation">
            <button class="bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="hover:bg-[#D6E8EE] rounded-xl text-center px-3 py-1.5" id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Contacts</button>
          </li>
      </ul>   
    </div>
    <button id="buttonJenisModal" type="submit" data-modal-target="tambahJenisModal" data-modal-toggle="tambahJenisModal"
    class="mr-3 flex h-8 w-8 p-1 bg-[#365486] group-hover:bg-[#304b78] rounded-full items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512">
        <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
      </svg>
    </button>
    
    <div id="tambahJenisModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Ubah Judul Modul
            </h3>
            <button data-modal-toggle="tambahJenisModal" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form class="space-y-4" method="post" action="{{route('judulEdu.store')}}">
              @csrf
              @method('post')
              <div>
                <label for="judulEdu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Edu</label>
                <input type="text" name="judul_modul" id="judul_modul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
              </div>
              <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    {{-- <div class="grid grid-flow-col">
      <a href="#">
        <ul class="relative w-11/12 list-none px-2 flex font-semibold gap-x-4 overflow-x-auto">
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
      <button class="ml-4 flex w-7 p-2 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
          <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
        </svg>
      </button>
    </div>  --}}
  </div>

  <div class="mx-4 mt-4 mb-4 grid grid-cols-[17%_auto] gap-x-4">
    <div class="bg-[#D6E8EE] rounded py-3 pl-4 flex flex-col">
      <div class="flex flex-row gap-x-4">
        <span class="text-xl font-semibold">Materi #1</span>
        <div class="group">
          <button class="mt-2 flex h-4 w-4 p-1 bg-[#365486] group-hover:bg-[#304b78] rounded-full items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 448 512">
              <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
          </button>
        </div>
      </div>
        <ul class="text-base mb-2">
          <li class="underline"><a href="#">Sub Materi #1</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #2</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #3</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #4</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #5</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #6</a></li>
        </ul>
      <div class="flex flex-row gap-x-4">
        <span class="text-xl font-semibold">Materi #2</span>
        <button class="mt-2 flex h-4 w-4 p-1 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
          <img class="w-2 h-2" src="storage/tombol-tambah.png" alt="tombol-tambah">
        </button>
      </div>
        <ul class="text-base mb-2">
          <li class="hover:underline"><a href="#">Sub Materi #1</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #2</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #3</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #4</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #5</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #6</a></li>
        </ul>
      <div class="flex flex-row gap-x-4">
        <span class="text-xl font-semibold">Materi #3</span>
        <button class="mt-2 flex h-4 w-4 p-1 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
          <img class="w-2 h-2" src="storage/tombol-tambah.png" alt="tombol-tambah">
        </button>
      </div>
        <ul class="text-base mb-2">
          <li class="hover:underline"><a href="#">Sub Materi #1</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #2</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #3</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #4</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #5</a></li>
          <li class="hover:underline"><a href="#">Sub Materi #6</a></li>
        </ul>
      <div class="flex flex-row gap-x-4">
        <span class="text-xl font-semibold">Materi #4</span>
        <button class="mt-2 flex h-4 w-4 p-1 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
          <img class="w-2 h-2" src="storage/tombol-tambah.png" alt="tombol-tambah">
        </button>
      </div>
    </div>

    <div class="bg-[#D6E8EE] rounded p-4">
      <div class="flex flex-row h-[auto] justify-between">
        <div class="flex flex-row gap-x-4">
          <span class="text-2xl font-bold">Sub Materi #1</span>
          <button><img class="h-6 w-6" src="{{ url('tombol-edit.png') }}" alt="tombol-edit"></button>
        </div>
        <span class="font-light mt-2">diunggah: 7 April 2024</span>
      </div>
      <p class="font-sm justify-content text-justify">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa tempora adipisci labore modi nostrum inventore atque iste ducimus nobis, nam suscipit debitis repellendus hic ullam necessitatibus a quam provident! Incidunt, sint dolor molestiae alias blanditiis illo in itaque odit. Ab facere neque adipisci nulla eaque. Totam non nemo optio voluptate porro at consectetur veniam, sunt ducimus labore nam omnis praesentium molestiae quis. Odio provident itaque veritatis harum aut! Dolore officiis porro molestias vel a necessitatibus illo temporibus earum cum provident itaque, debitis omnis quibusdam possimus aspernatur maxime placeat vitae magni voluptates numquam nesciunt deleniti sunt. Quos nostrum obcaecati blanditiis et.
      </p>
      <div class="grid grid-cols-[auto_auto] gap-x-4 mt-2">
        <img class="justify-center item-center h-[175px] rounded-xl" src="{{ url('dummy2.png') }}" alt="petani">
        <p class="font-sm justify-content text-justify">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat nostrum, exercitationem dignissimos, possimus ipsa sunt eveniet est modi delectus, deleniti illum atque deserunt? Deserunt provident est illo excepturi consequatur itaque, fugiat similique eius natus voluptate ut amet fuga consectetur veritatis ad aliquid esse voluptatum impedit distinctio illum! Harum laudantium dicta animi assumenda eius beatae ipsa quisquam dolorem asperiores magnam sunt id exercitationem iste nesciunt, fuga explicabo sapiente cumque. Totam, saepe.
        </p>
      </div>
      <div class="bg-[#7FC7D9] mt-4 p-4">
        <span class="text-2xl font-bold">Video Materi</span>
        <a href="#">
          <img class="p-4 h-auto w-auto" src="{{ url('video-test.png') }}" alt="">
        </a>
        <div>
          <span class="p-4 text-2xl font-bold underline underline-offset-8">Penilaian</span>
          <div class="flex flex-row p-4">
            <img class="h-10" src="{{ url('bintang.png') }}" alt="">
            <span class="flex ml-4 items-center font-light justify-center">5/5 (100 ulasan)</span>
          </div>
          <span class="p-4 text-2xl font-bold underline underline-offset-8">Komentar</span>
          <div class="p-4">
            <div class="flex flex-row justify-between">
              <div>
                <div class="grid grid-cols-[50%_50%] mb-2">
                  <span class="font-bold">Agus Hartono</span>
                  <span class="font-light ml-6">1 bulan lalu</span>
                </div>
                <p class="">Mudah dipahami dan gampang dicerna</p>
              </div>
              <span class="flex items-center font-semibold mr-8 hover:underline"><a href="#">Balas</a></span>
            </div>
            <hr class="my-4 border border-black rounded">
            <div class="flex flex-row justify-between">
              <div>
                <div class="grid grid-cols-[50%_50%] mb-2">
                  <span class="font-bold">Siti Amirah</span>
                  <span class="font-light ml-6">1 minggu lalu</span>
                </div>
                <p>Video keren dan memberi banyak pengetauan</p>
              </div>
              <span class="flex items-center font-semibold mr-8 hover:underline"><a href="#">Balas</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>