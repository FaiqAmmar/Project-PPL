@extends('master-layout.navbarDashboardKonsultasi')
@section('title', 'Konsultasi')
@section('content')

<div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <div class="flex items-center px-14 pt-10">
    <div class="flex flex-col gap-0">
      <span class="text-3xl font-semibold text-black">Konsultasi</span>
      <span class="text-sm font-medium text-gray-400">Tanyakan masalahmu disini!</span>
    </div>
  </div>
  <div class="relative h-96 overflow-y-auto px-14 pt-4 pb-14">
    <div class="flex flex-row justify-between border-black border-b-[1px] pb-1">
      <div class="flex flex-col gap-1 w-[90%]">
        <p class="font-bold text-lg">Judul</p>
        <p class="text-xs font-semibold">Oleh</p>
        <p class="text-base font-semibold">Menanam</p>
      </div>
      <div class="flex flex-col w-auto">
        <p class="text-xs font-semibold">14 Agustus 2024</p>
        <div class="flex items-center justify-center h-full">
          <a href="" class="py-2.5 px-4 bg-[#FEFEFE] rounded-xl mt-3">
            <svg class="relative text-black h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M3.5 4h9c.25 0 .485.06.692.169L8.75 7.5a1.25 1.25 0 0 1-1.5 0L2.808 4.169C3.015 4.06 3.251 4 3.5 4M2.001 5.438L2 5.5v5A1.5 1.5 0 0 0 3.5 12h9a1.5 1.5 0 0 0 1.5-1.5v-5l-.001-.062L9.65 8.7a2.75 2.75 0 0 1-3.3 0zM.5 5.5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3z" clip-rule="evenodd"/>
              <p class="absolute text-xs font-black ml-[18px] -mt-[29px]">10</p>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection