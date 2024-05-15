@extends('master-layout.navbarDashboardModul')
@section('title', 'Modul')
@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold">Modul Bahan Ajar</span>
    </div>
    <div class="flex items-center">
      @if (Auth::user()->roles_id == 3)
      <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" type="button" class="flex p-1 bg-[#365486] hover:bg-[#304b78] hover:text-gray-300 rounded-full text-white items-center justify-center">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
          <path fill="currentColor" d="M8.25 3a.5.5 0 0 1 .5.5v3.75h3.75a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8.75v3.75a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5V8.75H3.5a.5.5 0 0 1-.5-.5v-.5a.5.5 0 0 1 .5-.5h3.75V3.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </button>
      @endif
    </div>
  </div>
  <div class="relative h-96 overflow-y-auto mt-4 px-14">
    <table class="text-xs w-full text-center rtl:text-right table-auto">
      <thead class="font-semibold text-center text-sm">
        <tr>
          <th scope="col" class="px-2 py-2 w-10">No</th>
          <th scope="col" class="px-2 py-2">Judul Modul</th>
          <th scope="col" class="px-2 py-2 w-96">Deskripsi Modul</th>
          <th scope="col" class="px-2 py-2">Video</th>
          <th scope="col" class="px-2 py-2">Tanggal upload</th>
          <th scope="col" class="px-2 py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($modul as $index => $tablemodul)
        <tr>
          <td class="px-2 py-2">{{ $index + 1 }}</td>
          <td class="px-2 py-2">{{ $tablemodul->judul_modul }}</td>
          <td class="px-2 py-2 text-justify">{{ $tablemodul->deskripsi_modul }}</td>
          <td class="px-2 py-2">{{ $tablemodul->video }}</td>
          <td class="px-2 py-2">{{ $tablemodul->created_at->format('j F Y') }}</td>
          @if (Auth::user()->roles_id == 3)
            @if ($tablemodul->status == 'Menunggu')
            <td class="px-2 py-2 font-bold">{{ $tablemodul->status }}</td>
            @elseif ($tablemodul->status == 'Disetujui')
            <td class="px-2 py-2 font-bold text-[#04AA6D]">{{ $tablemodul->status }}</td>
            @else
            <td class="px-2 py-2 font-bold text-[#FF0000]">{{ $tablemodul->status }}</td>
            @endif
          @else
            <td class="px-2 py-2 font-bold text-black">
              <form action="{{ route('update.modul', $tablemodul->id) }}" method="post">
                @csrf
                @method('PUT')
                <select onchange="this.form.submit()" class="p-2 rounded-2xl border-0 bg-[#7FC7D9]" name="status" id="status">
                  @foreach (['Menunggu', 'Ditolak', 'Disetujui'] as $status)
                    @if ($status == "Ditolak")
                    <option class="font-bold text-[#FF0000]" value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @elseif ($status == "Disetujui")
                    <option class="font-bold text-[#04AA6D]"  value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @else
                    <option class="font-bold"  value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @endif
                  @endforeach
                </select>
                  {{-- <option class="font-bold" value="Menunggu">Menunggu</option>
                  <option class="font-bold text-[#04AA6D]" value="Disetujui">Disetujui</option>
                  <option class="font-bold text-[#FF0000]" value="Ditolak">Ditolak</option> --}}
              </form>
            </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div id="modal-tambah" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-screen-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-center justify-center pt-4 px-4">
        <h3 class="text-xl font-bold text-black">
          Tambahkan Modul
        </h3>
      </div>
      <!-- Modal body -->
      <div class="px-4 pb-2">
        <form action="/tambah-modul" method="post" enctype="multipart/form-data">
        @csrf
          <div>
            <div class="flex flex-col py-2 px-4">
              <label class="font-semibold text-black text-lg" for="judul_modul">Judul Modul</label>
              <input class="rounded-xl border-dashed border-[#1D46A6]	border-4 focus:border-[#1D46A6] focus:ring-transparent" 
              type="text" name="judul_modul" id="judul_modul">
            </div>
            <div class="flex flex-row gap-4">
              <div class="w-1/2 p-3">
                <div>
                  <label class="font-semibold text-black text-lg" for="modul">File Modul</label>
                  <input type="file" accept=".pdf" name="modul" 
                  class="m-2 rounded-xl border-dashed border-[#1D46A6]	border-4 p-2">
                </div>
                <div>
                  <label class="font-semibold text-black text-lg" for="video">Video Modul</label>
                  <input type="file" accept="video/*" name="video" 
                  class="m-2 rounded-xl border-dashed border-[#1D46A6]	border-4 p-2">
                </div>
              </div>
              <div class="w-1/2 p-3 flex flex-col">
                <label class="font-semibold text-black text-lg" for="deskripsi_modul">Deskripsi Modul</label>
                <textarea class="p-2 rounded-xl border-dashed border-[#1D46A6]	border-4 focus:border-[#1D46A6] focus:ring-transparent"
                name="deskripsi_modul" id="deskripsi_modul" cols="20" rows="6" style="resize:none"></textarea>
              </div>
            </div>
            <div class="flex flex-row gap-24 justify-center">
              <button type="button" class="w-1/4 text-white bg-[#FF0000] hover:bg-[#cc0000] focus:ring-inset focus:ring-4 focus:outline-none focus:ring-[#FF0000] font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-hide="modal-tambah">Batal</button>
              <button type="submit" class="w-1/4 text-white bg-[#1D46A6] hover:bg-[#163682] focus:ring-inset focus:ring-4 focus:outline-none focus:ring-[#1D46A6] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div> 


@endsection