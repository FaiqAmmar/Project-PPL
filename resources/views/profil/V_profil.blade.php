@extends('master-layout.navbarDashboardProfil')
@section('title', 'Profil')
@section('content')

<div class="bg-[#48B477]/[0.2] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Profil</span>
  <div class="py-6 text-lg h-auto">
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nama</span>
      <div>
        <span class="font-light flex w-full border border-black">{{ $currentuser->nama }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Email</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->email }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nomor Handphone</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->nomor_handphone }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Gender</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->gender }}</span>
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Alamat</span>
      <div>
        <span class="alamat-span font-light flex w-full">{{ $currentuser->alamat }}, {{ $currentuser->district_name }}, {{ $currentuser->city_name }}, {{ $currentuser->province_name }}</span>
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

@endsection