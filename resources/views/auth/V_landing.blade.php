@extends('master-layout.public')
@section('title', 'Homepage')
@section('content')

<section>
  <div class="bg-[#F5F5F5]">
    <div class="flex flex-row pl-10 gap-24 pb-5">
      <div class="flex flex-col w-5/6">
        <div class="pt-12 pb-14 px-16 max-w-lg flex-auto my-20 text-left bg-[#48B477] rounded-3xl shadow-[10px_10px_0px_0px_rgba(72,180,119,0.5)]">
          <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Selamat Datang<br>di Agro Edu.</h2>
          <p class="mt-6 text-lg leading-8 text-slate-700">Sistem Informasi Platform Edukasi Daring Bidang Pertanian Berbasis Website</p>
          <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
            <a href="login" class="rounded-md bg-[#A4E2BF] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm 
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white 
            hover:scale-110 hover:shadow-2xl transition-all duration-100">Masuk</a>
            <a href="register-role" class="rounded-md bg-white ring-2 px-3.5 py-2.5 text-sm font-semibold text-[#48B477] shadow-sm 
            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white 
            hover:scale-110 hover:shadow-2xl transition-all duration-100">Daftar →</a>
          </div>
        </div>
      </div>
      <div class="overflow-hidden relative my-10 h-auto w-full rounded-l-3xl" data-carousel="slide">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ url('assets/img/carousel/1.jpg') }}"
            class="absolute block w-full h-full" alt="1">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ url('assets/img/carousel/2.jpg') }}"
            class="absolute block w-full h-full" alt="2">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ url('assets/img/carousel/3.jpg') }}"
            class="absolute block w-full h-full" alt="3">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ url('assets/img/carousel/4.jpg') }}"
            class="absolute block w-full h-full" alt="4">
        </div>
      </div>
    </div>
  </div>    
  <div class="flex justify-center items-center py-5 font-poppins tracking-wide font-bold bg-[#48B477]/[0.28]">
    ©2024 AgroEdu
  </div>
</section>

@endsection