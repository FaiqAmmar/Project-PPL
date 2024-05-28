<div class="flex flex-row h-12 rounded-xl w-auto bg-[#FFFFFF] items-center mx-4 mt-3 px-3 justify-between">
  @if (Auth::user()->roles_id == 1)
  <div id="scrollbar-under" class="w-[97%] flex flex-row overflow-x-auto text-sm font-medium gap-3 h-auto">
    @foreach ($jenis as $JenisEdu)
    <div class="flex flex-row relative z-0">
      <a href="/edukasi/{{ $JenisEdu->id }}" class="z-0 relative flex bg-[#EEEEEE] text-black py-1.5 px-4 rounded-lg
      hover:bg-[#A4E2BF] hover:text-[#45795C] transition-all duration-100">
        {{$JenisEdu->judul_modul}}
      </a>
      <button data-modal-target="modal-edit-1{{$JenisEdu->id}}" data-modal-toggle="modal-edit-1{{$JenisEdu->id}}" type="button"
      class="absolute mt-0.5 -mr-1 right-0 z-10 flex text-gray-400 hover:text-gray-600 transition-all duration-100">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <path fill="currentColor" fill-rule="evenodd" d="M11.423 1A3.577 3.577 0 0 1 15 4.577c0 .27-.108.53-.3.722l-.528.529l-1.971 1.971l-5.059 5.059a3 3 0 0 1-1.533.82l-2.638.528a1 1 0 0 1-1.177-1.177l.528-2.638a3 3 0 0 1 .82-1.533l5.059-5.059l2.5-2.5c.191-.191.451-.299.722-.299m-2.31 4.009l-4.91 4.91a1.5 1.5 0 0 0-.41.766l-.38 1.903l1.902-.38a1.5 1.5 0 0 0 .767-.41l4.91-4.91a2.077 2.077 0 0 0-1.88-1.88Zm3.098.658a3.59 3.59 0 0 0-1.878-1.879l1.28-1.28c.995.09 1.788.884 1.878 1.88l-1.28 1.28Z" clip-rule="evenodd"/>
        </svg>
      </button>
    </div>
    <form action="{{ route('jenis.edit', $JenisEdu->id) }}" method="post">
    @csrf
    @method('PUT')
      <!-- Modal Edit -->
      <div id="modal-edit-1{{$JenisEdu->id}}" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-center pt-3 px-6">
              <h3 class="text-2xl font-bold text-black mb-4">
                Ubah Jenis Edukasi
              </h3>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col justify-center px-6 pb-4">
              <input id="judul_modul" name="judul_modul" type="text" placeholder="Ubah Jenis Edukasi" value="{{$JenisEdu->judul_modul}}"
              class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
              <div class="flex flex-row gap-6 justify-center mt-4">
                <button type="submit" 
                class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
                <button type="button" data-modal-hide="modal-edit-1{{$JenisEdu->id}}"
                class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    @endforeach
  </div>
  <button data-modal-target="modal-tambah-1" data-modal-toggle="modal-tambah-1" type="button" class="flex text-white items-center justify-center p-1 bg-[#48B477] rounded-full
  hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
      <path fill="currentColor" d="M8.25 3a.5.5 0 0 1 .5.5v3.75h3.75a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8.75v3.75a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5V8.75H3.5a.5.5 0 0 1-.5-.5v-.5a.5.5 0 0 1 .5-.5h3.75V3.5a.5.5 0 0 1 .5-.5z"/>
    </svg>
  </button>

  <form action="/jenis-edukasi" method="post">
  @csrf
    <!-- Modal Tambah -->
    <div id="modal-tambah-1" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 h-auto w-auto max-w-[632px] max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg">
          <!-- Modal header -->
          <div class="flex items-center justify-center pt-3 px-6">
            <h3 class="text-2xl font-bold text-black mb-4">
              Tambah Jenis Edukasi
            </h3>
          </div>
          <!-- Modal body -->
          <div class="flex flex-col justify-center px-6 pb-4">
            <input id="judul_modul" name="judul_modul" type="text" placeholder="Masukkan Jenis Edukasi"
            class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
            <div class="flex flex-row gap-6 justify-center mt-4">
              <button type="submit" 
              class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
              hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
              <button type="button" data-modal-hide="modal-tambah-1"
              class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
              hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  @else
  <div id="scrollbar-under" class="flex flex-row overflow-x-auto text-sm font-medium gap-3">
    @foreach ($jenis as $JenisEdu)
    <div class="flex flex-row z-0 relative">
      <a href="/edukasi/{{ $JenisEdu->id }}" class="z-0 relative flex bg-[#EEEEEE] text-black py-1.5 px-4 rounded-lg
      hover:bg-[#A4E2BF] hover:text-[#45795C] transition-all duration-100">
        {{$JenisEdu->judul_modul}}
      </a>
    </div>
    @endforeach
  </div>
  @endif
</div>