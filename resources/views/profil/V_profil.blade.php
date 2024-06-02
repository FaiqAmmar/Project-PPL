@extends('master-layout.navbarDashboardProfil')
@section('title', 'Profil')
@section('content')

<!-- Modal Notifikasi -->
<div id="modal-notif" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg">
      <!-- Modal header -->
      <div class="flex items-center justify-center pt-3 px-6">
        <h3 class="text-2xl font-bold text-black mb-4">
          {{ session('success') }}
        </h3>
      </div>
      <!-- Modal body -->
      <div class="flex flex-col justify-center items-center px-6 pb-4">
        <button type="button" data-modal-hide="modal-notif"
        class="w-1/2 text-white font-medium rounded-lg text-sm py-2.5 text-center bg-[#48B477]
        hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Kembali</button>
      </div>
    </div>
  </div>
</div>

@if(session('success'))
<div id="success-message" data-message="{{ session('success') }}"></div>
@endif

<div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
  <div class="bg-[#48B477] rounded px-8 pt-2 pb-4">
    <div class="grid grid-rows-[240px_200px] gap-y-9">
      <div class="flex flex-col justify-center">
        @if (Auth::user()->foto_profil != null)
        <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }}" alt="profile-pic">
        @else
        <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('assets/img/anon-pic.png') }}" alt="profile-pic">
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
        <a href="{{ route('edit.profil', $currentuser->id) }}" class="flex bg-[#FFFFFF] w-[150px] h-[45px] justify-center items-center self-center rounded-xl
          hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Edit</a>
        <a href="/logout" class="flex bg-[#FF0000] w-[150px] h-[45px] justify-center items-center self-center rounded-xl text-white
        hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Logout</a>
      </div>
      @endif
    </div>
  </div>

<div class="bg-[#48B477]/[0.2] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Profil</span>
  <div class="py-6 text-lg h-auto">
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nama</span>
      <div>
        <span class="font-base flex w-full px-3 py-1 rounded-full bg-[#FFFFFF]">{{ $currentuser->nama }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Email</span>
      <div>
        <span class="font-base flex w-full px-3 py-1 rounded-full bg-[#FFFFFF]">{{ $currentuser->email }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nomor Handphone</span>
      <div>
        <span class="font-base flex w-full px-3 py-1 rounded-full bg-[#FFFFFF]">{{ $currentuser->nomor_handphone }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Gender</span>
      <div>
        <span class="font-base flex w-full px-3 py-1 rounded-full bg-[#FFFFFF]">{{ $currentuser->gender }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Alamat</span>
      <div>
        <span class="font-base flex w-full px-3 py-1 rounded-full bg-[#FFFFFF] h-auto">{{ $currentuser->alamat }}, {{ $currentuser->district_name }}, {{ $currentuser->city_name }}, {{ $currentuser->province_name }}</span>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const addressSpan = document.querySelector(".alamat-span");
    const capitalizeText = (text) => {
      return text.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
    };

    addressSpan.textContent = capitalizeText(addressSpan.textContent);
  });
</script>

<script src="{{ url('/assets/js/notification.js')}}"></script>

@endsection