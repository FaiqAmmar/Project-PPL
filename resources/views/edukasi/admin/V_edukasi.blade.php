@extends('master-layout.navbarDashboardEdukasi')
@section('title', 'Edukasi')
@section('content')

<style>
  .rating-star {
      font-size: 24px; /* Ubah ukuran bintang di sini */
  }
  .rating-avg {
      font-size: 24px; /* Ubah ukuran bintang di sini */
  }
</style>
  
@include('edukasi.admin.partials.header')

  <div class="mx-4 mt-4 mb-4 grid grid-cols-[17%_auto] gap-x-4">

    @include('edukasi.admin.partials.aside')

    <div class="bg-[#D6E8EE] rounded p-4">
      @if ($firstSub != null)
        <div class="flex flex-row h-[auto] justify-between">
          <div class="flex flex-row gap-x-4">
            <span class="text-2xl font-bold">{{ $firstSub->judul }} </span>
            <button data-modal-toggle="editSubModal" data-modal-target="editSubModal"><img class="h-6 w-6" src="{{ url('tombol-edit.png') }}" alt="tombol-edit"></button>
          </div>
          <span class="font-light mt-2">diunggah: {{ $firstSub->created_at->format('j F Y') }}</span>
        </div>
        <div class="flex ">
          <p class="font-sm justify-content text-justify flex flex-col">
            {{ $firstSub->body }}
          </p>
        </div>
        <div class="bg-[#7FC7D9] mt-4 p-4">
          <span class="text-2xl font-bold">Video Materi</span>
          <video controls class="p-4 h-auto w-auto">
            <source src="{{ asset('storage/' . $firstSub->video_path) }}" type="video/mp4">
            <!-- Sisipkan sumber video Anda di atas, pastikan untuk mengganti 'path-to-your-video.mp4' dengan URL video Anda -->
            <!-- Anda juga bisa menambahkan sumber video lainnya di sini sesuai format yang didukung -->
            Maaf, browser Anda tidak mendukung pemutaran video.
          </video>
          <div>
              <span class="p-4 text-2xl font-bold underline underline-offset-8">Penilaian</span>
              <div class="flex flex-row p-4">
                @for ($i = 0; $i < (intval($avgRating)); $i++)                                
                <span class="rating-avg text-yellow-500">&#9733;</span>
                @endfor                            
                @for ($i = 0; $i < (5 - intval($avgRating)); $i++)                                
                <span class="rating-avg">&#9733;</span>
                @endfor                            
                <span class="flex ml-4 items-center font-light justify-center">{{number_format($avgRating, 1)}}/5
                  ({{$firstRating}})</span>
              </div>
              <span class="p-4 text-2xl font-bold underline underline-offset-8">Komentar</span>
              @if (isset($firstSub->ulasan))
                @foreach ($firstSub->ulasan as $item)
                <div class="p-4">
                  <div class="flex flex-row justify-between">
                    <div>
                      <div class="grid grid-cols-[50%_50%] mb-2">
                        @if (isset($item->user_id) || isset($item->author))
                          @if (isset($item->user_id))
                          <span class="font-bold">{{$item->user->nama}}</span>
                          @else
                          <span class="font-bold">{{$item->author}}</span>
                          @endif
                        @else
                          <span class="font-bold">Anonymous</span>
                        @endif
                        <span class="font-light ml-6">{{ \Carbon\Carbon::parse($item->created_at)->format('F Y') }}                                        </span>
                      </div>
                      <p class="">{{$item->isi}}</p>
                    </div>
                    <span class="flex items-center font-semibold mr-8 hover:underline">
                      <a href="#">Balas</a>
                    </span>
                  </div>
                  <hr class="my-4 border border-black rounded">                                
                </div>
                @endforeach
              @endif
          </div>
        </div>
      @endif
    </div>
  </div>

{{-- modal edit sub --}}
@if(isset($firstSub->id))
<div id="editSubModal" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Edit Sub Materi Edukasi
        </h3>
        <button data-modal-toggle="editSubModal" type="button"
          class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
          data-modal-hide="authentication-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
    </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <form class="space-y-4" enctype="multipart/form-data" method="post" action="{{ route('admin.edukasi.sub.edit', [$firstSub->id]) }}">
        @csrf
        @method('put')
          <div>
            <label for="judulEdu"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Sub
              Materi Edukasi <span class="text-red-500">*</span></label>
            <input type="text" name="judul" id="judul"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              value="{{ old('judul', $firstSub->judul) }}"
              required />
            <label for="judulEdu"
              class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi Sub
              Materi Edukasi <span class="text-red-500">*</span></label>
            <textarea name="body" id="body"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              required>{{old('body',$firstSub->body)}} </textarea>
            <label for="video"
              class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Video</label>
            <input type="file" name="video" id="video"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
              accept="video/*">
          </div>
          <button type="submit" class="w-full text-white bg-blue-700 
          hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

@endsection