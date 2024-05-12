@extends('master-layout.navbarDashboardProfil')
@section('title', 'Profil')
@section('content')

<div class="bg-[#D6E8EE] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Profil</span>
  <div class="py-6 text-lg h-auto">
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nama</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->nama }}</span>
        <hr class="border border-black rounded">
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Email</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->email }}</span>
        <hr class="border border-black rounded">
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Nomor Handphone</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->nomor_handphone }}</span>
        <hr class="border border-black rounded">
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Gender</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->gender }}</span>
        <hr class="border border-black rounded">
      </div>
    </div>
    <div class="grid grid-cols-[25%_75%] mb-4">
      <span class="font-bold">Alamat</span>
      <div>
        <span class="font-light flex w-full">{{ $currentuser->alamat }}, {{ $currentuser->district_name }}, {{ $currentuser->city_name }}, {{ $currentuser->province_name }}</span>
        <hr class="border border-black rounded">
      </div>
    </div>
  </div>
</div>

@endsection