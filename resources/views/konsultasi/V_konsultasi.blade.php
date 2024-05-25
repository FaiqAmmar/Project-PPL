@extends('master-layout.navbarDashboardKonsultasi')
@section('title', 'Konsultasi')
@section('content')

<div class="h-[85vh] mx-4 mt-3 mb-2.5 rounded bg-[#FFFFFF]">
  <div class="flex items-center px-14 pt-8">
    <div class="flex flex-col gap-0">
      <span class="text-3xl font-semibold text-[#48B477]">Konsultasi</span>
      <span class="text-sm font-medium text-black">Tanyakan masalahmu disini!</span>
    </div>
  </div>
  <div id="scrollbar" class="relative h-2/3 overflow-y-auto ml-14 mr-10 mt-2 px-4 pt-3 pb-2 bg-[#48B477]/[0.35] rounded-xl">
    @foreach ($balasanArray as $item)
    <div class="flex flex-row justify-between border-black border-b-[1px] py-2">
      <div class="flex flex-col gap-1 w-[90%]">
        <p class="font-bold text-lg">{{$item['konsultasi']->konsultasi}}</p>
        <p class="text-xs font-semibold">Oleh {{$item['konsultasi']->user->nama}}</p>
        <div>
            @if ($item['latest_balasan'])
                <p class="text-base font-semibold">{{ $item['latest_balasan']->balasan }}</p>
            @else
                <p class="text-base font-semibold">Balasan Kosong</p>
            @endif
        </div>
      </div>
      <div class="flex flex-col w-auto">
        <p class="text-xs font-semibold">{{$item['konsultasi']->created_at->format('j F Y')}}</p>
        <div class="flex items-center justify-center h-full">
          <a href="{{route('balasan', ['id'=> $item['konsultasi']->id])}}" class="py-2.5 px-4 bg-[#48B477] text-black rounded-xl mt-3
            hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
            <svg class="relative h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M3.5 4h9c.25 0 .485.06.692.169L8.75 7.5a1.25 1.25 0 0 1-1.5 0L2.808 4.169C3.015 4.06 3.251 4 3.5 4M2.001 5.438L2 5.5v5A1.5 1.5 0 0 0 3.5 12h9a1.5 1.5 0 0 0 1.5-1.5v-5l-.001-.062L9.65 8.7a2.75 2.75 0 0 1-3.3 0zM.5 5.5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3z" clip-rule="evenodd"/>
              @php
                $balasanCount = \App\Models\BalasanKonsultasi::where('konsultasi_id', $item['konsultasi']->id)->count();
              @endphp
              <p class="absolute text-xs font-black ml-[18px] -mt-[29px]">{{$balasanCount}}</p>
            </svg>
          </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @if (Auth::user()->roles_id == 2)
  <form method="post" action="{{ route('konsultasi.store') }}"
  class="flex flex-row items-center pl-12 pr-14 pt-4 justify-center gap-10">
  @csrf 
    <input placeholder="Tanya disini" autocomplete="off" 
    class="w-1/3 text-sm rounded-3xl border-0 bg-[#EEEEEE]
    focus:ring-2 focus:ring-[#48B477]"
    type="text" name="konsultasi" id="konsultasi">
    <button type="button" data-modal-target="modal-konfirmasi" data-modal-toggle="modal-konfirmasi"
    class="p-2 bg-[#48B477] rounded-3xl 
    hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
      <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
        <path fill="currentColor" fill-rule="evenodd" d="M5.254 8.521L9.61 5.86a.75.75 0 0 1 .782 1.28L6.586 9.465L9.77 12.65a1.199 1.199 0 0 0 1.973-.433l2.692-7.308a1.045 1.045 0 0 0-.98-1.408h-.105c-.1 0-.201.013-.298.04L2.022 6.509a.707.707 0 0 0 .046 1.375zm-3.48.834L5 10l3.71 3.71a2.7 2.7 0 0 0 4.44-.976l2.693-7.308A2.544 2.544 0 0 0 13.454 2h-.104c-.232 0-.464.03-.688.091l-11.03 2.97a2.207 2.207 0 0 0 .142 4.294" clip-rule="evenodd"/>
      </svg>
    </button>

    <!-- Modal Konfirmasi -->
    <div id="modal-konfirmasi" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-[332px] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex items-center justify-center pt-3 px-6">
            <h3 class="text-xl font-bold text-black mb-4 text-center">
              Apakah anda yakin ingin menanyakan ini?
            </h3>
          </div>
          <!-- Modal body -->
          <div class="flex flex-row justify-center gap-10 px-6 pb-4">
            <button type="submit" 
            class="w-1/3 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
            hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Yakin</button>
            <button type="button" data-modal-hide="modal-konfirmasi"
            class="w-1/3 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
            hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  @endif
</div>

@endsection