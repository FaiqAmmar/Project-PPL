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
  <div id="scrollbar" class="relative h-2/3 overflow-y-auto ml-14 mr-10 mt-2 px-4 py-3 bg-[#A4E1FF] rounded-xl">
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
        {{-- <p class="text-base font-semibold">{{$balasan->balasan}}</p> --}}
      </div>
      <div class="flex flex-col w-auto">
        <p class="text-xs font-semibold">{{$item['konsultasi']->created_at->format('j F Y')}}</p>
        <div class="flex items-center justify-center h-full">
          <a href="{{route('balasan', ['id'=> $item['konsultasi']->id])}}" class="py-2.5 px-4 bg-[#FEFEFE] rounded-xl mt-3">
            <svg class="relative text-black h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
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
    <input class="w-1/3 text-sm rounded-3xl border-0 focus:ring-2 focus:ring-[#A4E1FF]"
    type="text" name="konsultasi" id="konsultasi">
    <button class="p-2 bg-white rounded-3xl" type="submit">
      <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
        <path fill="currentColor" fill-rule="evenodd" d="M5.254 8.521L9.61 5.86a.75.75 0 0 1 .782 1.28L6.586 9.465L9.77 12.65a1.199 1.199 0 0 0 1.973-.433l2.692-7.308a1.045 1.045 0 0 0-.98-1.408h-.105c-.1 0-.201.013-.298.04L2.022 6.509a.707.707 0 0 0 .046 1.375zm-3.48.834L5 10l3.71 3.71a2.7 2.7 0 0 0 4.44-.976l2.693-7.308A2.544 2.544 0 0 0 13.454 2h-.104c-.232 0-.464.03-.688.091l-11.03 2.97a2.207 2.207 0 0 0 .142 4.294" clip-rule="evenodd"/>
      </svg>
    </button>
  </form>
  @endif
</div>

@endsection