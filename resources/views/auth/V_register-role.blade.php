@extends('master-layout.public')
@section('title', 'Register Role')
@section('content')

<section class="w-screen h-screen bg-[#48B477]/[0.3]">
  <div class="flex flex-col">
    <span class="flex my-14 font-bold font text-5xl justify-center text-black">Registrasi</span>
    <div class="flex flex-row gap-16 justify-center">
      <div class="flex flex-col my-auto  py-5 px-20 bg-white rounded-lg justify-center content-center items-center
      transition-all duration-75 hover:scale-110">
        <div>
          <span class="text-black font-bold text-2xl">Daftar Sebagai</span>
          <hr class="w-auto h-1 mx-auto my-1 bg-gray-400 border-0 rounded">
        </div>
        <img class="flex my-4 w-40" src="{{ url("assets/img/gov-pic.png")}}" alt="gov">
        <form action="/register-gov" method="GET">
          <button class="transition-all duration-100 flex bg-[#48B477] my-2 py-2 px-12 rounded-lg text-white font-bold text-xl 
          hover:bg-[#39905f]">
            Pemerintah</button>
        </form>
      </div>
      <div class="flex flex-row gap-16 justify-center ">
        <div class="flex flex-col my-auto  py-5 px-20 bg-white rounded-lg justify-center content-center items-center 
        transition-all duration-75 hover:scale-110">
          <div>
            <span class="text-black font-bold text-2xl">Daftar Sebagai</span>
            <hr class="w-auto h-1 mx-auto my-1 bg-gray-400 border-0 rounded">
          </div>
          <img class="flex my-4 w-40" src="{{ url("assets/img/user-pic.png")}}" alt="gov">
          <form action="/register-user" method="GET">
            <button class="transition-all duration-100 flex bg-[#48B477] my-2 py-2 px-12 rounded-lg text-white font-bold text-xl 
            hover:bg-[#39905f]">
              Pengguna</button>
          </form>
        </div>
    </div>
  </div>
</section>

@endsection