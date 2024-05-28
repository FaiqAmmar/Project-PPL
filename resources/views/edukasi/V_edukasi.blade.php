@extends('master-layout.navbarDashboardEdukasi')
@section('title', 'Edukasi')
@section('content')

<div class="flex flex-col gap-4">

  @include('edukasi.partials.V_jenis-edukasi')

  <div class="flex flex-row mx-4 gap-4 h-[444px]">

    @include('edukasi.partials.V_materi-edukasi')

    <div id="scrollbar" class="flex flex-col relative overflow-y-auto w-[78%] bg-[#FFFFFF] rounded-xl py-6 px-8 h-full gap-2">
      @if (url()->current() == url('/edukasi/'.$first->id))
      <span class="text-2xl font-semibold text-[#48B477]">Pilih Sub Materi</span>
      @else
      <div class="flex flex-row justify-between">
        <div class="flex flex-row gap-2">
          <span class="text-2xl font-semibold text-[#48B477]">{{$firstSub->judul}}</span>
          @if (Auth::user()->roles_id == 1)
          <button data-modal-target="modal-edit-3" data-modal-toggle="modal-edit-3" type="button"
          class="flex text-[#48B477] hover:text-[#39905f] transition-all duration-100 items-end mb-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M12.238 3.64a1.854 1.854 0 0 0-1.629-1.628l-.8.8a3.367 3.367 0 0 1 1.63 1.628zM4.74 7.88l3.87-3.868a1.854 1.854 0 0 1 1.628 1.629L6.369 9.51a1.5 1.5 0 0 1-.814.418l-1.48.247l.247-1.48a1.5 1.5 0 0 1 .418-.814ZM9.72.78l-2 2l-4.04 4.04a3 3 0 0 0-.838 1.628L2.48 10.62a1 1 0 0 0 1.151 1.15l2.17-.36a3 3 0 0 0 1.629-.839l4.04-4.04l2-2c.18-.18.28-.423.28-.677A3.353 3.353 0 0 0 10.397.5c-.254 0-.498.1-.678.28ZM2.75 13a.75.75 0 0 0 0 1.5h10.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>
            </svg>
          </button>
          <form action="{{ route('sub.edit') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
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
                  <div class="flex flex-col justify-center px-6 pb-4 gap-5">
                    <input type="hidden" name="id" value="{{ $firstSub->id }}">
                    <input id="judul" name="judul" type="text" placeholder="Ubah Sub Materi" value="{{ $firstSub->judul }}"
                    class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required></input>
                    <textarea id="body" name="body" type="text" placeholder="Ubah Sub Materi" style="resize: none" cols="10" rows="5"
                    class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 rounded-xl flex font-normal" required>{{ $firstSub->body }}</textarea>
                    <div class="flex flex-row gap-10">                                
                      <div class=" w-[47%]">
                        <input type="file" accept=".pdf" name="modul" required>
                      </div>
                      <div class=" w-[47%]">
                        <input type="file" accept="video/mp4" name="video">
                      </div>
                    </div>
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
          href="{{ url('storage/sub_moduls/' . $firstSub->modul) }}" download="{{$firstSub->modul}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M8.53 11.78a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 0 1 1.06-1.06l1.22 1.22V1.75a.75.75 0 1 1 1.5 0v7.69l1.22-1.22a.75.75 0 1 1 1.06 1.06zM1.75 13.5a.75.75 0 0 0 0 1.5h12.5a.75.75 0 0 0 0-1.5z" clip-rule="evenodd"/>
            </svg>
          </a>
          @endif
        </div>
        <span class="font-light">Diunggah: {{$firstSub->created_at->format('j F Y')}}</span>
      </div>
      <div class="flex flex-wrap">
        <p class="text-justify">
          {{$firstSub->body}}
        </p>
      </div>
      @if ($firstSub->video != null)
      <div class="flex flex-col bg-[#FBFBFB] p-5 rounded-xl gap-4">
        <span class="text-2xl font-semibold text-[#48B477]">Video</span>
        <embed class="mx-auto flex border-2 border-[#48B477]"
        src="{{ url('storage/sub_videos/' . $firstSub->video) }}" type="video/mp4" width="800" height="450">
        <div class="flex flex-col px-4 gap-2">
          <div class="flex flex-col gap-1">
            <div class="flex flex-row items-center gap-3">
              <span class=" text-xl font-semibold text-[#48B477] underline underline-offset-4">Penilaian</span>
              <button type="button" data-modal-target="modal-detail-1{{ $firstSub->id }}" data-modal-toggle="modal-detail-1{{ $firstSub->id }}"
              class="flex mt-2">
                <svg class="text-[#48B477] h-5 w-5 hover:text-[#39905f] transition-all duration-100" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                  <path fill="currentColor" fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11a5.5 5.5 0 0 0 0 11M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14m1-9.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-.25 3a.75.75 0 0 0-1.5 0V11a.75.75 0 0 0 1.5 0z" clip-rule="evenodd"/>
              </svg>
              </button>
              <!-- Modal detail -->
              <div id="modal-detail-1{{ $firstSub->id }}" tabindex="-1" aria-hidden="true" data-modal-backdrop="dynamic"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 h-auto w-auto max-w-screen-sm max-h-screen-sm">
                  <!-- Modal content -->
                  <div class="relative bg-white rounded-lg">
                    <!-- Modal header -->
                    <div class="flex items-center justify-center pt-3 px-6">
                      <h3 class="text-2xl font-bold text-black mb-4">
                        Detail Penilaian
                      </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="flex flex-col justify-center px-6 pb-4 gap-4">
                      @php
                        $rating5 = ($firstSub->rating)->where('rating', 5)->count();
                        $rating4 = ($firstSub->rating)->where('rating', 4)->count();
                        $rating3 = ($firstSub->rating)->where('rating', 3)->count();
                        $rating2 = ($firstSub->rating)->where('rating', 2)->count();
                        $rating1 = ($firstSub->rating)->where('rating', 1)->count();
                      @endphp
                      <div class="text-base text-black flex flex-row">
                        Total Rating&nbsp;<p class="text-yellow-500">★</p>5 : {{$rating5}}
                      </div>
                      <div class="text-base text-black flex flex-row">
                        Total Rating&nbsp;<p class="text-yellow-500">★</p>4 : {{$rating4}}
                      </div>
                      <div class="text-base text-black flex flex-row">
                        Total Rating&nbsp;<p class="text-yellow-500">★</p>3 : {{$rating3}}
                      </div>
                      <div class="text-base text-black flex flex-row">
                        Total Rating&nbsp;<p class="text-yellow-500">★</p>2 : {{$rating2}}
                      </div>
                      <div class="text-base text-black flex flex-row">
                        Total Rating&nbsp;<p class="text-yellow-500">★</p>1 : {{$rating1}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if (Auth::user()->roles_id != 1)
            <form id="ratingForm" action="{{ route('sub.rating') }}" method="post">
              @csrf
              <input type="hidden" name="sub_materi_edukasi_id" value="{{ $firstSub->id }}">
              <div id="ratingContainer" class="flex flex-row gap-1 p-3">
                <input type="radio" name="rating" value="1" id="rating-1" class="hidden">
                <label for="rating-1" class="star-label">★</label>
        
                <input type="radio" name="rating" value="2" id="rating-2" class="hidden">
                <label for="rating-2" class="star-label">★</label>
        
                <input type="radio" name="rating" value="3" id="rating-3" class="hidden">
                <label for="rating-3" class="star-label">★</label>
        
                <input type="radio" name="rating" value="4" id="rating-4" class="hidden">
                <label for="rating-4" class="star-label">★</label>
        
                <input type="radio" name="rating" value="5" id="rating-5" class="hidden">
                <label for="rating-5" class="star-label">★</label>
              </div>
              <button type="submit" class="rating-button">Kirim</button>
            </form>
          @endif
          </div>
          <div class="flex flex-col gap-1">
            <span class="text-xl font-semibold text-[#48B477] underline underline-offset-4">Komentar</span>
            <div class="flex flex-col gap-2">
              @foreach ($firstSub->ulasan as $komen)
              <div class="flex flex-row gap-5">
                <span class="text-base font-semibold">
                  {{$komen->user->nama}}
                </span>
                <span class="text-base font-light">
                  {{$komen->created_at->format('j F Y')}}
                </span>
              </div>
              <p class="font-base">{{$komen->ulasan}}</p>
              <hr class="border border-black rounded">
              @endforeach
              @if (Auth::user()->roles_id != 1)
              <form action="{{route('sub.ulasan')}}" method="post" class="flex flex-row gap-4 justify-center mt-3">
              @csrf
                <input type="hidden" name="sub_materi_edukasi_id" value="{{ $firstSub->id }}">
                <input placeholder="Ulas disini" autocomplete="off" 
                class="w-1/3 text-sm rounded-3xl border-0 bg-[#EEEEEE]
                focus:ring-2 focus:ring-[#48B477]"
                type="text" name="ulasan" id="ulasan" required>
                <button type="submit" class="p-2 bg-[#48B477] rounded-3xl 
                hover:bg-[#39905f] hover:scale-105 transition-all duration-100">
                  <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd" d="M5.254 8.521L9.61 5.86a.75.75 0 0 1 .782 1.28L6.586 9.465L9.77 12.65a1.199 1.199 0 0 0 1.973-.433l2.692-7.308a1.045 1.045 0 0 0-.98-1.408h-.105c-.1 0-.201.013-.298.04L2.022 6.509a.707.707 0 0 0 .046 1.375zm-3.48.834L5 10l3.71 3.71a2.7 2.7 0 0 0 4.44-.976l2.693-7.308A2.544 2.544 0 0 0 13.454 2h-.104c-.232 0-.464.03-.688.091l-11.03 2.97a2.207 2.207 0 0 0 .142 4.294" clip-rule="evenodd"/>
                  </svg>
                </button>
              </form>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endif
      @endif
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingContainer = document.getElementById('ratingContainer');
    const radioButtons = ratingContainer.querySelectorAll('input[type="radio"]');
    const labels = ratingContainer.querySelectorAll('.star-label');

    labels.forEach((label, index) => {
        label.addEventListener('click', () => {
            const value = index + 1;
            radioButtons.forEach((radio, i) => {
                radio.checked = i < value;
            });
            updateStarColors();
        });

        label.addEventListener('mouseover', () => {
            const value = index + 1;
            labels.forEach((_, i) => {
                if (i < value) {
                    labels[i].style.color = '#EAB308'; // Apply yellow color up to hovered star
                } else {
                    labels[i].style.color = '#D1D5DB'; // Reset to gray for stars beyond hovered one
                }
            });
        });

        label.addEventListener('mouseleave', () => {
            updateStarColors();
        });
    });

    function updateStarColors() {
        let foundChecked = false;
        radioButtons.forEach((radio, i) => {
            if (radio.checked) {
                foundChecked = true;
                labels[i].style.color = '#EAB308'; // Apply yellow color for checked stars
            } else {
                labels[i].style.color = foundChecked ? '#D1D5DB' : '#EAB308'; // Reset to gray for unchecked stars
            }
        });
    }

    updateStarColors(); // Set initial state based on checked stars
});

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