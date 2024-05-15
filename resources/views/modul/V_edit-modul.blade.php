@extends('master-layout.navbarDashboardModul')
@section('title', 'Modul')
@section('content')

<div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold">Modul Bahan Ajar</span>
    </div>
    <div class="flex items-center">
      <button data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" type="button" class="flex p-1 bg-[#365486] hover:bg-[#304b78] hover:text-gray-300 rounded-full text-white items-center justify-center">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
          <path fill="currentColor" d="M8.25 3a.5.5 0 0 1 .5.5v3.75h3.75a.5.5 0 0 1 .5.5v.5a.5.5 0 0 1-.5.5H8.75v3.75a.5.5 0 0 1-.5.5h-.5a.5.5 0 0 1-.5-.5V8.75H3.5a.5.5 0 0 1-.5-.5v-.5a.5.5 0 0 1 .5-.5h3.75V3.5a.5.5 0 0 1 .5-.5z"/>
        </svg>
      </button>
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
        @foreach ($modul as $Index => $tablemodul)
        <tr>
          <td class="px-2 py-2">{{ $index + 1 }}</td>
          <td class="px-2 py-2">{{ $tablemodul->judul_modul }}</td>
          <td class="px-2 py-2 text-justify">{{ $tablemodul->deskripsi_modul }}</td>
          <td class="px-2 py-2">{{ $tablemodul->video }}</td>
          <td class="px-2 py-2">{{ $tablemodul->tanggal_upload }}</td>
          @if (Auth::user()->roles_id == 3)
            @if ($tablemodul->status == 'Menunggu')
            <td class="px-2 py-2 font-bold">{{ $tablemodul->status }}</td>
            @elseif ($tablemodul->status == 'Disetujui')
            <td class="px-2 py-2 font-bold text-[#04AA6D]">{{ $tablemodul->status }}</td>
            @else
            <td class="px-2 py-2 font-bold text-[#FF0000]">{{ $tablemodul->status }}</td>
            @endif
          @else
          
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div id="modal-tambah" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Sign in to our platform
        </h3>
        <button data-modal-hide="modal-tambah" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <form class="space-y-4" action="#">
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
          </div>
          <div class="flex justify-between">
            <div class="flex items-start">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
              </div>
              <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
            </div>
            <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
          </div>
          <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
          <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
            Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 

@endsection