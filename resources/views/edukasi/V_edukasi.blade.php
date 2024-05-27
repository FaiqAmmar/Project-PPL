@extends('master-layout.navbarDashboardEdukasi')
@section('title', 'Edukasi')
@section('content')

<div class="flex flex-col gap-4">

  @include('edukasi.partials.V_jenis-edukasi')

  <div class="flex flex-row mx-4 gap-4 h-[444px]">

    @include('edukasi.partials.V_materi-edukasi')

    <div id="scrollbar-sidebar" class="flex flex-col relative overflow-y-auto w-[78%] bg-[#FFFFFF] rounded-xl py-6 px-8 h-full gap-2">
      <div class="flex flex-row justify-between">
        <div class="flex flex-row gap-2">
          <span class="text-2xl font-semibold text-[#48B477]">Judul</span>
          @if (Auth::user()->roles_id == 1)
          <button data-modal-target="modal-edit-3" data-modal-toggle="modal-edit-3" type="button"
          class="flex text-[#48B477] hover:text-[#39905f] transition-all duration-100 items-end mb-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M12.238 3.64a1.854 1.854 0 0 0-1.629-1.628l-.8.8a3.367 3.367 0 0 1 1.63 1.628zM4.74 7.88l3.87-3.868a1.854 1.854 0 0 1 1.628 1.629L6.369 9.51a1.5 1.5 0 0 1-.814.418l-1.48.247l.247-1.48a1.5 1.5 0 0 1 .418-.814ZM9.72.78l-2 2l-4.04 4.04a3 3 0 0 0-.838 1.628L2.48 10.62a1 1 0 0 0 1.151 1.15l2.17-.36a3 3 0 0 0 1.629-.839l4.04-4.04l2-2c.18-.18.28-.423.28-.677A3.353 3.353 0 0 0 10.397.5c-.254 0-.498.1-.678.28ZM2.75 13a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>
            </svg>
          </button>
          <form action="" method="post">
          {{-- @csrf
          @method('PUT') --}}
            <!-- Modal Edit -->
            <div id="modal-edit-3" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg">
                  <!-- Modal header -->
                  <div class="flex items-center justify-center pt-3 px-6">
                    <h3 class="text-2xl font-bold text-black mb-4">
                      Ubah Sub Materi
                    </h3>
                  </div>
                  <!-- Modal body -->
                  <div class="flex flex-col justify-center px-6 pb-4">
                    <input id="" name="" type="text" placeholder="Ubah Sub Materi"
                    class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
                    <div class="flex flex-row gap-6 justify-center mt-4">
                      <button type="submit" 
                      class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#48B477]
                      hover:bg-[#39905f] hover:scale-105 transition-all duration-100">Simpan</button>
                      <button type="button" data-modal-hide="modal-edit-3"
                      class="w-1/2 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-[#FF0000]
                      hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @else
          <a class="flex text-[#48B477] hover:text-[#39905f] transition-all duration-100 items-end mb-1 "
          href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M8.53 11.78a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 0 1 1.06-1.06l1.22 1.22V1.75a.75.75 0 1 1 1.5 0v7.69l1.22-1.22a.75.75 0 1 1 1.06 1.06zM1.75 13.5a.75.75 0 0 0 0 1.5h12.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>
            </svg>
          </a>
          @endif
        </div>
        <span class="font-light">Diunggah: Tanggal</span>
      </div>
      <div class="flex flex-wrap">
        <p class="text-justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur aspernatur culpa, magni asperiores harum recusandae est quibusdam omnis. In sequi optio ut sed maxime? Facere neque odit enim unde explicabo velit labore aliquam, nesciunt natus animi expedita quasi maxime rem totam, commodi nihil eaque doloremque repellendus dolorum laborum error eius cumque quo quis. Delectus, totam omnis! Tempore rerum quaerat fuga nobis earum, amet repudiandae quam. Iusto repellendus quod tempore quam perferendis vel ullam harum facere corrupti, laudantium, eius illo quo voluptates placeat in laboriosam officiis quisquam possimus molestias voluptatum ex, optio similique aspernatur minima. Libero, animi quis! Doloremque quo veritatis nostrum ex laborum repellat rem facilis sequi corporis est, ducimus a eaque expedita illum reiciendis voluptatum praesentium culpa. Aliquid expedita repudiandae excepturi? Eveniet ex architecto beatae praesentium nesciunt voluptatem omnis, molestiae sit reiciendis laudantium aspernatur perspiciatis hic aliquid neque blanditiis iste, totam, debitis fuga ipsa fugit in autem distinctio aliquam ad. Id, harum placeat. Repellendus corporis corrupti magnam quia a dolore esse id rerum culpa quis amet, iste accusamus accusantium dicta deleniti eveniet possimus, similique voluptatem sed. Qui repudiandae dolorum reiciendis saepe! Est necessitatibus a cum harum alias vel qui quos dolorum recusandae corrupti officiis, odio, autem modi commodi ratione.
        </p>
      </div>
      <div class="flex flex-col bg-[#FBFBFB] p-5 rounded-xl gap-4">
        <span class="text-2xl font-semibold text-[#48B477]">Video</span>
        <embed class="mx-auto flex border-2 border-[#48B477]"
        src="{{ url('storage/file_videos/grgrrgs.mp4') }}" type="video/mp4" width="800" height="450">
        <div class="flex flex-col px-4 gap-2">
          <div class="flex flex-col gap-1">
            <div class="flex flex-row items-center gap-3">
              <span class=" text-xl font-semibold text-[#48B477] underline underline-offset-4">Penilaian</span>
              <button type="button" data-modal-target="modal-detail" data-modal-toggle="modal-detail"
              class="flex mt-2">
                <svg class="text-[#48B477] h-5 w-5 hover:text-[#39905f] transition-all duration-100" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                  <path fill="currentColor" fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11a5.5 5.5 0 0 0 0 11M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14m1-9.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-.25 3a.75.75 0 0 0-1.5 0V11a.75.75 0 0 0 1.5 0z" clip-rule="evenodd"/>
              </svg>
              </button>
            </div>
            bintang
          </div>
          <div class="flex flex-col gap-1">
            <span class="text-xl font-semibold text-[#48B477] underline underline-offset-4">Komentar</span>
            <div class="flex flex-col gap-2">
              <div class="flex flex-row gap-5">
                <span class="text-base font-semibold">
                  Nama Orang
                </span>
                <span class="text-base font-light">
                  Tanggal kirim
                </span>
              </div>
              <p class="font-base">Lorem ipsum</p>
              <hr class="border border-black rounded">
              <div class="flex flex-row gap-4 justify-center mt-3">
                <input placeholder="Ulas disini" autocomplete="off" 
                class="w-1/3 text-sm rounded-3xl border-0 bg-[#EEEEEE]
                focus:ring-2 focus:ring-[#48B477]"
                type="text" name="balasan" id="balasan" required>
                <button type="submit" class="p-2 bg-[#48B477] rounded-3xl 
                hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
                  <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd" d="M5.254 8.521L9.61 5.86a.75.75 0 0 1 .782 1.28L6.586 9.465L9.77 12.65a1.199 1.199 0 0 0 1.973-.433l2.692-7.308a1.045 1.045 0 0 0-.98-1.408h-.105c-.1 0-.201.013-.298.04L2.022 6.509a.707.707 0 0 0 .046 1.375zm-3.48.834L5 10l3.71 3.71a2.7 2.7 0 0 0 4.44-.976l2.693-7.308A2.544 2.544 0 0 0 13.454 2h-.104c-.232 0-.464.03-.688.091l-11.03 2.97a2.207 2.207 0 0 0 .142 4.294" clip-rule="evenodd"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection