@extends('master-layout.navbarDashboardBahanAjar')
@section('title', 'Edit Bahan Ajar')
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

<div class="h-[85vh] mx-4 mt-3 mb-2.5 rounded bg-[#FFFFFF]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold text-[#48B477]">Detail Ajuan Bahan Ajar</span>
    </div>
  </div>
  <div class="relative h-96 overflow-y-auto mt-4 px-14">
    <table id="scrollbar" class="text-xs w-full text-center rtl:text-right table-auto">
      <thead class="font-semibold text-center text-sm text-[#EEEEEE] bg-[#48B477] border-x border-[#48B477]"">
        <tr>
          <th scope="col" class="px-2 py-2 w-10">No</th>
          <th scope="col" class="px-2 py-2 w-auto">Ajuan</th>
          <th scope="col" class="px-2 py-2 w-52">Tanggal</th>
          <th scope="col" class="px-2 py-2 w-7"></th>
        </tr>
      </thead>
      <tbody class="border-b border-[#48B477]">
        @foreach ($currentBahanAjar as $index => $tablemodul)
        <tr class="border-b border-[#48B477]">
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $index + 1 }}</td>
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->ajuan }}</td>
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->created_at->format('j F Y') }}</td>
          <td class="px-2 py-2 border-x border-[#48B477]">
            <button class="bg-[#48B477] p-2 rounded-xl text-black
            hover:bg-[#39905f] hover:scale-105 transition-all duration-100"
            type="button" data-modal-target="modal-edit{{$tablemodul->id}}" data-modal-toggle="modal-edit{{$tablemodul->id}}">
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                <path fill="currentColor" fill-rule="evenodd" d="M11.423 1A3.577 3.577 0 0 1 15 4.577c0 .27-.108.53-.3.722l-.528.529l-1.971 1.971l-5.059 5.059a3 3 0 0 1-1.533.82l-2.638.528a1 1 0 0 1-1.177-1.177l.528-2.638a3 3 0 0 1 .82-1.533l5.059-5.059l2.5-2.5c.191-.191.451-.299.722-.299m-2.31 4.009l-4.91 4.91a1.5 1.5 0 0 0-.41.766l-.38 1.903l1.902-.38a1.5 1.5 0 0 0 .767-.41l4.91-4.91a2.077 2.077 0 0 0-1.88-1.88Zm3.098.658a3.59 3.59 0 0 0-1.878-1.879l1.28-1.28c.995.09 1.788.884 1.878 1.88l-1.28 1.28Z" clip-rule="evenodd"/></svg>
            </button>

            <form action="{{ route('update.bahan-ajar', $tablemodul->id) }}" method="post">
              @csrf
              @method('PUT')
                <!-- Modal Konfirmasi -->
                <div id="modal-edit{{$tablemodul->id}}" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
                  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                      <!-- Modal header -->
                      <div class="flex items-center justify-center pt-3 px-6">
                        <h3 class="text-2xl font-bold text-black mb-4">
                          Ubah Ajuan?
                        </h3>
                      </div>
                      <!-- Modal body -->
                      <div class="flex flex-col justify-center px-6 pb-4">
                        <textarea name="ajuan" id="ajuan" cols="60" rows="5"
                        class="bg-[#EEEEEE] rounded-xl p-2 border-[#48B477] focus:border-[#48B477] hover:border-[#48B477] focus:ring-0"
                        style="resize:none" oninvalid="this.setCustomValidity('Mohon Isi Kolom Bahan Ajar')">{{ $tablemodul->ajuan }}</textarea>
                        <div class="flex flex-row gap-12 justify-center mt-4">
                          <button type="submit" 
                          class="w-1/3 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                          hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Yakin</button>
                          <button type="button" data-modal-hide="modal-edit{{$tablemodul->id}}"
                          class="w-1/3 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                          hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script src="{{ url('/assets/js/notification.js')}}"></script>

@endsection