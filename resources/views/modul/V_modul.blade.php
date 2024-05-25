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

<div class="h-[85vh] mx-4 mt-3 mb-3 rounded bg-[#FFFFFF]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold text-[#48B477]">Modul</span>
    </div>
    <div class="flex items-center">
      @if (Auth::user()->roles_id == 3)
      <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" type="button" class="flex text-white items-center justify-center p-1 bg-[#48B477] rounded-full
      hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
          <path fill="currentColor" d="M8.25 3a.5.5 0 0 1 .5.5v3.75h3.75a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8.75v3.75a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5V8.75H3.5a.5.5 0 0 1-.5-.5v-.5a.5.5 0 0 1 .5-.5h3.75V3.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </button>
      @endif
    </div>
  </div>
  <div id="scrollbar" class="relative h-96 overflow-y-auto mt-4 px-14">
    <table class="text-xs w-full text-center rtl:text-right table-auto">
      <thead class="font-semibold text-center text-sm text-[#EEEEEE] bg-[#48B477] border-x border-[#48B477]">
        <tr>
          <th scope="col" class="px-2 py-2 w-10">No</th>
          <th scope="col" class="px-2 py-2 w-60">Judul Modul</th>
          <th scope="col" class="px-2 py-2 w-96">Deskripsi Modul</th>
          <th scope="col" class="px-2 py-2 w-56">Video</th>
          <th scope="col" class="px-2 py-2 ">Tanggal upload</th>
          <th scope="col" class="px-2 py-2 ">Status</th>
        </tr>
      </thead>
      <tbody class="border-b border-[#48B477]">
        @foreach ($modul as $index => $tablemodul)
        <tr class="border-b border-[#48B477]">
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $index + 1 }}</td>
          <td class="px-2 py-2 border-x border-[#48B477] hover:font-semibold hover:text-[#48B477] transition-all duration-75">
            <button type="button" data-modal-target="modal-pdf{{$tablemodul->id}}" data-modal-toggle="modal-pdf{{$tablemodul->id}}">
              {{ $tablemodul->judul_modul }}</button></td>
          <td class="px-2 py-2 text-justify border-x border-[#48B477]">{{ $tablemodul->deskripsi_modul }}</td>
          <td class="px-2 py-2 border-x border-[#48B477] hover:font-semibold hover:text-[#48B477] transition-all duration-75">
            <button type="button" data-modal-target="modal-video{{$tablemodul->id}}" data-modal-toggle="modal-video{{$tablemodul->id}}">
              {{ $tablemodul->video }}</button></td>
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->created_at->format('j F Y') }}</td>
          @if (Auth::user()->roles_id == 3)
            @if ($tablemodul->status == 'Menunggu')
            <td class="px-2 py-2 font-bold border-x border-[#48B477]">{{ $tablemodul->status }}</td>
            @elseif ($tablemodul->status == 'Disetujui')
            <td class="px-2 py-2 font-bold text-[#04AA6D] border-x border-[#48B477]">{{ $tablemodul->status }}</td>
            @else
            <td class="px-2 py-2 font-bold text-[#FF0000] border-x border-[#48B477]">{{ $tablemodul->status }}</td>
            @endif
          @else
            <td class="px-2 py-2 font-bold text-black border-x border-[#48B477]">
              <form action="{{ route('update.modul', $tablemodul->id) }}" method="post">
                @csrf
                @method('PUT')
                <select onchange="this.form.submit()" name="status" id="status"
                @if ($tablemodul->status == "Ditolak")
                class="p-2 rounded-2xl border-0 bg-[#48B477]/[0.5] text-[#FF0000]"
                @elseif ($tablemodul->status == "Disetujui")
                class="p-2 rounded-2xl border-0 bg-[#48B477]/[0.5] text-[#04AA6D]"
                @else
                class="p-2 rounded-2xl border-0 bg-[#48B477]/[0.5] text-black"
                @endif>
                  @foreach (['Menunggu', 'Ditolak', 'Disetujui'] as $status)
                    @if ($status == "Ditolak")
                    <option class="font-bold text-[#FF0000]" value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @elseif ($status == "Disetujui")
                    <option class="font-bold text-[#04AA6D]"  value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @else
                    <option class="font-bold text-black"  value="{{ $status }}" @selected(old('status', $tablemodul->status) == $status)>{{ $status }}</option>
                    @endif
                  @endforeach
                </select>
              </form>
            </td>
          @endif
        </tr>

        <div tabindex="-1" aria-hidden="true" id="modal-pdf{{$tablemodul->id}}" data-modal-backdrop="dynamic"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-[632px] max-h-full">
            <!-- Modal content -->
            <div class="bg-[#EEEEEE] border-[#48B477] border-2 rounded-lg">
              <!-- Modal body -->
              <div class="flex flex-col items-center p-4 px-auto">
                <embed src="{{ url('storage/file_moduls/'. $tablemodul->modul) }}" type="application/pdf" width="600" height="500">
              </div>
            </div>
          </div>
        </div>

        <div tabindex="-1" aria-hidden="true" id="modal-video{{$tablemodul->id}}" data-modal-backdrop="dynamic"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-[886px] max-h-full">
              <!-- Modal content -->
              <div class="bg-[#EEEEEE] border-[#48B477] border-2 rounded-lg">
                <!-- Modal body -->
                <div class="flex flex-col items-center p-4 px-auto">
                  <embed src="{{ url('storage/file_videos/'. $tablemodul->video) }}" type="video/mp4" width="854" height="480">
                </div>
              </div>
            </div>
          </div>

        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div id="modal-tambah" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
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
        <form id="modulForm" action="/tambah-modul" method="post" enctype="multipart/form-data">
        @csrf
          <div>
            <div class="flex flex-col py-2 px-4">
              <label class="font-semibold text-black text-lg" for="judul_modul">Judul Modul</label>
              <input class="rounded-xl border-dashed border-[#48B477]	border-4 focus:border-[#48B477] focus:ring-transparent" 
              type="text" name="judul_modul" id="judul_modul" placeholder="Isi Judul Disini" autocomplete="off">
            </div>
            <div class="flex flex-col py-2 px-4">
              <div class="flex flex-row gap-10">                                
                <div class="form-field w-[47%]">
                  <label class="font-semibold text-black text-lg" for="modul">File Modul</label>
                  <label for="fileModul" class="custom-file-label">
                    <span id="fileModulText">Pilih File PDF</span>
                  </label>
                  <input type="file" accept=".pdf" name="modul" id="fileModul" class="hidden">
                </div>
                <div class="form-field w-[47%]">
                  <label class="font-semibold text-black text-lg" for="video">Video Modul</label>
                  <label for="fileVideo" class="custom-file-label">
                    <span id="fileVideoText">Pilih File Video MP4</span>
                  </label>
                  <input type="file" accept="video/mp4" name="video" id="fileVideo" class="hidden">
                </div>
              </div>
              <div class="flex flex-col">
                <label class="font-semibold text-black text-lg" for="deskripsi_modul">Deskripsi Modul</label>
                <textarea class="h-auto p-2 rounded-xl border-dashed border-[#48B477]	border-4 focus:border-[#48B477] focus:ring-transparent"
                name="deskripsi_modul" id="deskripsi_modul" cols="20" rows="5" style="resize:none" placeholder="Isi Deskripsi Disini" autocomplete="off"></textarea>
              </div>
            </div>
            <div class="flex flex-row mt-2 gap-24 justify-center">
              <button type="submit" 
              class="w-1/4 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
              hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
              <button type="button" data-modal-hide="modal-tambah" id="cancelButton"
              class="w-1/4 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
              hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div> 

<script>
  // Function to update file input text
  function updateFileInputText(fileInput, textElement, defaultText) {
    fileInput.addEventListener('change', function() {
      const fileName = this.files[0] ? this.files[0].name : defaultText;
      textElement.textContent = fileName !== defaultText ? fileName : defaultText;
    });
  }

  // Update File Modul input text
  updateFileInputText(
    document.getElementById('fileModul'),
    document.getElementById('fileModulText'),
    'Pilih File PDF'
  );

  // Update Video Modul input text
  updateFileInputText(
    document.getElementById('fileVideo'),
    document.getElementById('fileVideoText'),
    'Pilih File Video MP4'
  );

    // Reset form function
    function resetForm() {
    document.getElementById('modulForm').reset();
    document.getElementById('fileModulText').textContent = 'Choose a PDF file';
    document.getElementById('fileVideoText').textContent = 'Choose an MP4 video';
  }

  // Event listener for cancel button
  document.getElementById('cancelButton').addEventListener('click', function() {
    resetForm();
  });
</script>

@endsection