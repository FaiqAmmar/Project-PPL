@extends('master-layout.navbarDashboardProfil')
@section('title', 'Melihat Pengguna')
@section('content')

<div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
  <div class="bg-[#48B477] rounded px-8 pt-2 pb-4">
    <div class="grid grid-rows-[240px_200px] gap-y-9">
      <div class="flex flex-col justify-center">
        @if (Auth::user()->foto_profil != null)
        <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }}" alt="profile-pic">
        @else
        <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('assets/img/anon-pic.png') }}" alt="profile-pic">
        @endif
        <span class="self-center mt-4 text-2xl font-semibold sm:text-base whitespace-nowrap text-black">{{ Auth::user()->nama }}</span>
        <hr class="self-center my-2 w-24 border border-black rounded">
        @if (Auth::user()->roles_id == 1)
        <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Admin</span>
        @elseif (Auth::user()->roles_id == 2)
        <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Pengguna</span>
        @else
        <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Pemerintah</span>
        @endif
      </div>
      @if (Auth::user()->roles_id == 1)
      <div class="flex flex-col font-semibold pt-3 text-base gap-y-2 justify-center">
        <a href="/lihat-gov" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
        hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Akun Pemerintah</a>
        <a href="/lihat-user" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
        hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Akun Pengguna</a>
        <a href="{{ route('edit.profil', $currentuser->id) }}" class="flex bg-[#FFFFFF] w-[150px] h-[60px] justify-center items-center self-center rounded-xl
        hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Edit</a>
        <a href="/logout" class="flex bg-[#FF0000] w-[150px] h-[60px] justify-center items-center self-center rounded-xl text-white
        hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Logout</a>
      </div>
      @else
      <div class="flex flex-col font-semibold pt-20 text-base gap-y-2 justify-center">
        <a href="{{ route('edit.profil', $currentuser->id) }}" class="flex bg-[#FFFFFF] w-[150px] h-[45px] justify-center items-center self-center rounded-xl
          hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Edit</a>
        <a href="/logout" class="flex bg-[#FF0000] w-[150px] h-[45px] justify-center items-center self-center rounded-xl text-white
        hover:bg-[#E50000] hover:scale-105 transition-all duration-100">Logout</a>
      </div>
      @endif
    </div>
  </div>

<div class="bg-[#48B477]/[0.2] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Akun Pengguna</span>
  <div class="relative h-96 overflow-y-auto overflow-x-auto mt-4">
    <table id="scrollbar" class="text-xs w-full text-left rtl:text-right">
      <thead class="font-bold text-white bg-[#48B477]">
        <tr>
          <th scope="col" class="w-1/3 px-2 py-2">Nama</th>
          <th scope="col" class="px-2 py-2">Email</th>
          <th scope="col" class="px-2 py-2 w-7"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $seeuser)
        <tr class="bg-[#EEEEEE] border-b ">
          <td class="font-semibold px-2 py-2">{{ $seeuser->nama }}</td>
          <td class="px-2 py-2">{{ $seeuser->email }}</td>
          <td class="px-2 py-2">
            <button type="button" data-modal-target="modal-detail{{$seeuser->id}}" data-modal-toggle="modal-detail{{$seeuser->id}}">
              <svg class="text-[#48B477] h-5 w-5 hover:text-[#39905f] transition-all duration-100" xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 16 16">
                <path fill="currentColor" fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11a5.5 5.5 0 0 0 0 11M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14m1-9.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-.25 3a.75.75 0 0 0-1.5 0V11a.75.75 0 0 0 1.5 0z" clip-rule="evenodd"/>
            </svg>
            </button>
          </td>
        </tr>

        <div tabindex="-1" aria-hidden="true" id="modal-detail{{$seeuser->id}}" data-modal-backdrop="dynamic"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-[332px] max-h-full">
            <!-- Modal content -->
            <div class="bg-[#EEEEEE] border-[#48B477] border-2 rounded-lg">
              <!-- Modal header -->
              <div class="flex items-center justify-center px-4 pt-2 w-full mb-4">
                <h3 class="text-3xl font-medium text-black">
                    Profil Pengguna
                </h3>
              </div>
              <!-- Modal body -->
              <div class="flex flex-col items-center">
                <div class="flex justify-center px-4 pb-2 w-full">
                  @if ($seeuser->foto_profil != null)
                  <img class="bg-white border-2 border-[#48B477] w-40 h-40 rounded-full object-cover" src="{{ url('storage/fotoprofil/'. $seeuser->foto_profil) }} " alt="profil-pic">
                  @else
                  <img class="bg-white border-2 border-[#48B477] w-40 h-40 rounded-full object-cover" src="{{ url('assets/img/anon-pic.png') }}" alt="profil-pic">
                  @endif
                </div>
                <div class="flex flex-col items-center px-8 pb-1 gap-0 w-full">
                  <label class="w-full text-left pl-2 font-medium" for="nama">Nama</label>
                  <div class="bg-[#E5E5E5] w-full py-1 px-2 text-left text-sm rounded-md ">{{$seeuser->nama}}</div>
                </div>
                <div class="flex flex-col items-center px-8 pb-1 gap-0 w-full">
                  <label class="w-full text-left pl-2 font-medium" for="email">Email</label>
                  <div class="bg-[#E5E5E5] w-full py-1 px-2 text-left text-sm rounded-md ">{{$seeuser->email}}</div>
                </div>
                <div class="flex flex-col items-center px-8 pb-1 gap-0 w-full">
                  <label class="w-full text-left pl-2 font-medium" for="nomor_handphone">Nomor Handphone</label>
                  <div class="bg-[#E5E5E5] w-full py-1 px-2 text-left text-sm rounded-md ">{{$seeuser->nomor_handphone}}</div>
                </div>
                <div class="flex flex-col items-center px-8 pb-1 gap-0 w-full">
                  <label class="w-full text-left pl-2 font-medium" for="gender">Gender</label>
                  <div class="bg-[#E5E5E5] w-full py-1 px-2 text-left text-sm rounded-md ">{{$seeuser->gender}}</div>
                </div>
                <div class="flex flex-col items-center px-8 pb-3 gap-0 w-full">
                  <label class="w-full text-left pl-2 font-medium" for="alamat">Alamat</label>
                  <textarea style="resize:none" cols="10" rows="3" readonly
                  class="alamat-textarea bg-[#E5E5E5] w-full py-1 px-2 text-left text-sm rounded-md border-0 ring-0 focus:ring-0"
                  >{{$seeuser->alamat}}, {{$seeuser->district_name}}, {{$seeuser->city_name}}, {{$seeuser->province_name}}</textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const textareas = document.querySelectorAll(".alamat-textarea");
      const capitalizeText = (text) => {
          return text.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
      };

      textareas.forEach(textarea => {
          textarea.value = capitalizeText(textarea.value);
      });
  });
</script>

@endsection