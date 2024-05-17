@extends('master-layout.navbarDashboardBahanAjar')
@section('title', 'Bahan Ajar')
@section('content')

<div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <form action="/tambah-bahan-ajar" method="post">
    @csrf
    <div class="flex flex-col gap-4 p-6">
      <div class="flex flex-row justify-between">
        <div class="flex flex-col gap-1">
          <label class="font-semibold text-4xl" for="">Modul Bahan Ajar</label>
          <p class="font-semibold text-[#5D5D5D] text-lg">Ajukan Materi yang Ingin Anda Pelajari di Sini!</p>
        </div>
        <div class="flex items-center">
          <a class="font-semibold hover:underline mr-4" href="#">
            Lihat Detail Ajuan
          </a>
        </div>
      </div>
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <textarea name="ajuan" id="ajuan" cols="30" rows="13"
      class="rounded-xl p-2" style="resize:none"></textarea>
      <div class="flex justify-center">
        <button class="rounded-xl transition-all text-white bg-[#1D46A6] hover:bg-[#3354a3] focus:ring-inset focus:ring-4 focus:outline-none shadow-inner focus:shadow-2xl focus:bg-[#163682] focus:ring-[#3354a3] font-medium text-smtext-center py-2 px-16" 
         type="submit">Ajukan</button>
      </div>
    </div>

    {{-- <!-- Modal Konfirmasi -->
    <div id="modal-konfirmasi" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-screen-sm max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
          <!-- Modal header -->
          <div class="flex items-center justify-center pt-8 px-4">
            <h3 class="text-xl font-bold text-black mb-6">
              Apakah anda yakin ingin mengajukan ini?
            </h3>
          </div>
          <!-- Modal body -->
          <div class="px-4 pb-4">
              <div class="flex flex-row gap-24 justify-center">
                <button type="button" class="w-1/4 transition-all text-white bg-[#FF0000] hover:bg-[#ff4747] focus:ring-inset focus:ring-4 focus:outline-none shadow-inner focus:shadow-2xl focus:bg-[#cc0000] focus:ring-[#ff4747] font-medium rounded-lg text-sm px-5 py-2.5 text-center" data-modal-hide="modal-konfirmasi">Batal</button>
                <button type="submit" class="w-1/4 transition-all text-white bg-[#1D46A6] hover:bg-[#3354a3] focus:ring-inset focus:ring-4 focus:outline-none shadow-inner focus:shadow-2xl focus:bg-[#163682] focus:ring-[#3354a3] font-medium rounded-lg text-sm px-5 py-2.5 text-center">Yakin</button>
              </div>
          </div>
        </div>
      </div>
    </div>  --}}

  </form>
</div>



@endsection