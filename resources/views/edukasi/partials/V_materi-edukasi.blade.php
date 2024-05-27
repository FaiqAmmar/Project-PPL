<div id="scrollbar-sidebar" class="flex flex-col relative overflow-y-auto w-[21%] bg-[#FFFFFF] rounded-xl px-3 py-2 gap-0">
  @if (Auth::user()->roles_id == 1)
  <button data-modal-target="modal-tambah-2" data-modal-toggle="modal-tambah-2" type="button" 
  class="flex text-white items-center justify-center p-1 bg-[#48B477] rounded-full font-semibold mb-2
  hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Tambah Materi
  </button>
  <form action="" method="post">
    {{-- @csrf --}}
      <!-- Modal Tambah -->
      <div id="modal-tambah-2" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 h-auto w-auto max-w-[632px] max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-center pt-3 px-6">
              <h3 class="text-2xl font-bold text-black mb-4">
                Tambah Materi
              </h3>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col justify-center px-6 pb-4">
              <input id="" name="" type="text" placeholder="Masukkan Materi"
              class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
              <div class="flex flex-row gap-6 justify-center mt-4">
                <button type="submit" 
                class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
                <button type="button" data-modal-hide="modal-tambah-2"
                class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  @endif
  <div class="flex flex-col">
    <div class="flex flex-row justify-between items-center">
      <div class="flex flex-row flex-wrap gap-1">
        <div class="font-semibold text-[#48B477] text-3xl">
          Materi
        </div>
        @if (Auth::user()->roles_id == 1)
        <button data-modal-target="modal-edit-2" data-modal-toggle="modal-edit-2" type="button"
        class="flex text-[#48B477] hover:text-[#39905f] transition-all duration-100 items-end mb-0.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
            <path fill="currentColor" fill-rule="evenodd" d="M12.238 3.64a1.854 1.854 0 0 0-1.629-1.628l-.8.8a3.367 3.367 0 0 1 1.63 1.628zM4.74 7.88l3.87-3.868a1.854 1.854 0 0 1 1.628 1.629L6.369 9.51a1.5 1.5 0 0 1-.814.418l-1.48.247l.247-1.48a1.5 1.5 0 0 1 .418-.814ZM9.72.78l-2 2l-4.04 4.04a3 3 0 0 0-.838 1.628L2.48 10.62a1 1 0 0 0 1.151 1.15l2.17-.36a3 3 0 0 0 1.629-.839l4.04-4.04l2-2c.18-.18.28-.423.28-.677A3.353 3.353 0 0 0 10.397.5c-.254 0-.498.1-.678.28ZM2.75 13a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>
          </svg>
        </button>
        <form action="" method="post">
          {{-- @csrf
          @method('PUT') --}}
            <!-- Modal Edit -->
            <div id="modal-edit-2" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg">
                  <!-- Modal header -->
                  <div class="flex items-center justify-center pt-3 px-6">
                    <h3 class="text-2xl font-bold text-black mb-4">
                      Ubah Materi
                    </h3>
                  </div>
                  <!-- Modal body -->
                  <div class="flex flex-col justify-center px-6 pb-4">
                    <input id="" name="" type="text" placeholder="Ubah Materi"
                    class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
                    <div class="flex flex-row gap-6 justify-center mt-4">
                      <button type="submit" 
                      class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                      hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
                      <button type="button" data-modal-hide="modal-edit-2"
                      class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                      hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        @endif
      </div>
      @if (Auth::user()->roles_id == 1)
      <div>
        <button data-modal-target="modal-tambah-3" data-modal-toggle="modal-tambah-3" type="button" class="flex text-white items-center justify-center p-1 bg-[#48B477] rounded-full
        hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
            <path fill="currentColor" d="M8.25 3a.5.5 0 0 1 .5.5v3.75h3.75a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8.75v3.75a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5V8.75H3.5a.5.5 0 0 1-.5-.5v-.5a.5.5 0 0 1 .5-.5h3.75V3.5a.5.5 0 0 1 .5-.5z"/>
          </svg>
        </button>
        <form action="" method="post">
        {{-- @csrf --}}
          <!-- Modal Tambah -->
          <div id="modal-tambah-3" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 h-auto w-auto max-w-md max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg">
                <!-- Modal header -->
                <div class="flex items-center justify-center pt-3 px-6">
                  <h3 class="text-2xl font-bold text-black mb-4">
                    Tambah Sub Materi
                  </h3>
                </div>
                <!-- Modal body -->
                <div class="flex flex-col justify-center px-6 pb-4 gap-5">
                  <input id="" name="" type="text" placeholder="Masukkan Sub Materi"
                  class="bg-[#EEEEEE] w-80 focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
                  <textarea id="" name="" type="text" placeholder="Masukkan Sub Materi" style="resize: none" cols="10" rows="5"
                  class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></textarea>
                  <div class="flex flex-row gap-6 justify-center mt-4">
                    <button type="submit" 
                    class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                    hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
                    <button type="button" data-modal-hide="modal-tambah-3"
                    class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                    hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      @endif
    </div>
    <div class="flex flex-col gap-1">
      <a href=""
      class="bg-[#48B477]/[0.3] w-full px-2 rounded-lg">
        Sub
      </a>
    </div>
  </div>
</div>

