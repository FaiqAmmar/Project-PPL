@extends('master-layout.navbarDashboardKonsultasi')
@section('title', 'Konsultasi')
@section('content')

<div class="h-[85vh] mx-4 mt-3 mb-2.5 rounded bg-[#FFFFFF]">
  <div class="flex items-center pl-10 pr-14 pt-10">
    <a href="/konsultasi" class="flex flex-row items-center py-2 px-3 h-10 bg-[#48B477] rounded-xl
    hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
        <path fill="currentColor" fill-rule="evenodd" d="M10.53 2.97a.75.75 0 0 1 0 1.06L6.56 8l3.97 3.97a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 0" clip-rule="evenodd"/>
      </svg>
      <span class="mb-0.5 font-semibold">Kembali</span>
    </a>
  </div>
  <div id="scrollbar" class="relative h-2/3 overflow-y-auto mx-10 px-4 mt-4 py-4 bg-[#48B477]/[0.35] rounded-xl">
    @foreach ($balasan as $item)
    <div class="flex w-full flex-col justify-between">
      <div class="flex flex-col gap-1 w-full border-black border-b-[1px] pb-1">
        <div class="flex flex-row gap-10 items-center">
          <p class="font-bold text-lg">{{$item->user->nama}}</p>
          <p class="text-xs font-semibold">{{$item->created_at->format('j F Y')}}</p>
        </div>
        <p class="text-base">{{$item->balasan}}</p>
      </div> 
    </div>
    @endforeach
  </div>
  @if (Auth::user()->roles_id == 2 || Auth::user()->roles_id == 3)
  <form action="{{ route('balasan.store')}}" method="post"
  class="flex flex-row items-center pl-12 pr-14 pt-4 justify-center gap-10">
    @csrf
    <input placeholder="Balas disini" autocomplete="off" 
    class="w-1/3 text-sm rounded-3xl border-0 bg-[#EEEEEE]
    focus:ring-2 focus:ring-[#48B477]"
    type="text" name="balasan" id="balasan" required>
    <input type="hidden" name="konsultasi_id" value="{{$konsultasi->id}}">
    <button type="submit" class="p-2 bg-[#48B477] rounded-3xl 
    hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
      <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
        <path fill="currentColor" fill-rule="evenodd" d="M5.254 8.521L9.61 5.86a.75.75 0 0 1 .782 1.28L6.586 9.465L9.77 12.65a1.199 1.199 0 0 0 1.973-.433l2.692-7.308a1.045 1.045 0 0 0-.98-1.408h-.105c-.1 0-.201.013-.298.04L2.022 6.509a.707.707 0 0 0 .046 1.375zm-3.48.834L5 10l3.71 3.71a2.7 2.7 0 0 0 4.44-.976l2.693-7.308A2.544 2.544 0 0 0 13.454 2h-.104c-.232 0-.464.03-.688.091l-11.03 2.97a2.207 2.207 0 0 0 .142 4.294" clip-rule="evenodd"/>
      </svg>
    </button>
  </form>
  @endif
</div>

@endsection