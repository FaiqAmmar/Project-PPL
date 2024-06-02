@extends('master-layout.navbarDashboardBahanAjar')
@section('title', 'Bahan Ajar')
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

<div class="h-[85vh] mx-4 my-2.5 rounded bg-[#FFFFFF]">
  <form action="/tambah-bahan-ajar" method="post">
    @csrf
    <div class="flex flex-col gap-4 p-6">
      <div class="flex flex-row justify-between">
        <div class="flex flex-col gap-1">
          <label class="font-semibold text-4xl text-[#48B477]" for="">Bahan Ajar</label>
          <p class="font-semibold text-black text-lg">Ajukan Materi yang Ingin Anda Pelajari di Sini!</p>
        </div>
        <div class="flex items-center">
          <a class="font-semibold hover:text-[#48B477] hover:underline mr-4" href="/edit-bahan-ajar">
            Lihat Detail Ajuan
          </a>
        </div>
      </div>
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <textarea name="ajuan" id="ajuan" cols="30" rows="13"
      class="rounded-xl p-2 border bg-[#EEEEEE] border-[#48B477] focus:border-[#48B477] hover:border-[#48B477] focus:ring-0"
      style="resize:none" oninvalid="this.setCustomValidity('Mohon Isi Kolom Bahan Ajar')"></textarea>
      <div class="flex justify-center">
        <button type="button" data-modal-target="modal-konfirmasi" data-modal-toggle="modal-konfirmasi"
        class="rounded-xl font-medium text-sm text-center py-2 px-16 text-white
        bg-[#48B477] hover:bg-[#39905f] hover:scale-105 transition-all duration-100" 
        >Ajukan</button>
      </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="modal-konfirmasi" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-[332px] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex items-center justify-center pt-3 px-6">
            <h3 class="text-xl font-bold text-black mb-4 text-center">
              Apakah anda yakin ingin mengajukan ini?
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
</div>

<script src="{{ url('/assets/js/notification.js')}}"></script>

@endsection