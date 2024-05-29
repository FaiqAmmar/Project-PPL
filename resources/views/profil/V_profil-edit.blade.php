@extends('master-layout.navbarDashboardProfil')
@section('title', 'Edit Profil')
@section('content')

<div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
  <div class="bg-[#48B477] rounded px-8 pt-2 pb-4">
    <div class="grid grid-rows-[240px_200px] gap-y-9">
      <div class="flex flex-col justify-center">
        <div class="relative flex flex-row justify-center">
          @if (Auth::user()->foto_profil != null)
          <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('storage/fotoprofil/'. Auth::user()->foto_profil) }}" alt="profile-pic">
          @else
          <img class="self-center bg-white w-32 h-32 rounded-full object-cover" src="{{ url('assets/img/anon-pic.png') }}" alt="profile-pic">
          @endif
          <button data-modal-target="modal-edit" data-modal-toggle="modal-edit" type="button"
          class="absolute p-1.5 bg-[#D1E9CA] text-black ml-20 rounded-full
          hover:bg-[#BCD1B5] transition-all duration-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
              <path fill="currentColor" fill-rule="evenodd" d="M11.423 1A3.577 3.577 0 0 1 15 4.577c0 .27-.108.53-.3.722l-.528.529l-1.971 1.971l-5.059 5.059a3 3 0 0 1-1.533.82l-2.638.528a1 1 0 0 1-1.177-1.177l.528-2.638a3 3 0 0 1 .82-1.533l5.059-5.059l2.5-2.5c.191-.191.451-.299.722-.299m-2.31 4.009l-4.91 4.91a1.5 1.5 0 0 0-.41.766l-.38 1.903l1.902-.38a1.5 1.5 0 0 0 .767-.41l4.91-4.91a2.077 2.077 0 0 0-1.88-1.88Zm3.098.658a3.59 3.59 0 0 0-1.878-1.879l1.28-1.28c.995.09 1.788.884 1.878 1.88l-1.28 1.28Z" clip-rule="evenodd"/>
            </svg>
          </button>
        </div>
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

<div class="bg-[#48B477]/[0.2] rounded px-12 pt-12 pb-4">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif
  <span class="text-3xl font-semibold">Edit Profil</span>
  <form action="{{ route('update.profil', $currentuser->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="py-6 text-lg h-auto w-full flex flex-col">
      <div class="flex flex-row mb-3 w-full gap-[51px]">
        <div class="flex flex-row gap-5">
          <label for="nama" class="flex font-bold items-center">Nama</label>
          <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" value="{{ $currentuser->nama }}"
          class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 font-light rounded-full flex w-64" required></input>
        </div>
        <div class="flex flex-row gap-5">
          <label for="nomor_handphone" class="flex font-bold items-center">Nomor Handphone</label>
          <input id="nomor_handphone" name="nomor_handphone" type="text" placeholder="08**********" value="{{ $currentuser->nomor_handphone }}"
          class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 font-light rounded-full flex w-64" required></input>
        </div>
      </div>
      <div class="flex flex-row mb-3 w-full gap-[51px]">
        <div class="flex flex-row gap-6">
          <label for="email" class="flex font-bold items-center">Email</label>
          <input id="email" name="email" type="text" placeholder="nama@email.com" value="{{ $currentuser->email }}"
          class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 font-light rounded-full flex w-64" required></input>
        </div>
        <div class="flex flex-row gap-[104px]">
          <label for="password" class="flex font-bold items-center">Password</label>
          <input id="password" name="password" type="text" placeholder="Masukkan Password Baru"
          class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 font-light rounded-full flex w-64"></input>
        </div>
      </div>
      <div class="flex flex-row mb-3 w-full gap-10">
        <div class="flex flex-row gap-6">
          <label for="foto_profil" class="flex font-bold items-center">Foto Profil</label>
          <div class="file-input-wrapper"> 
            <input type="file" accept="image/*" name="foto_profil" id="foto_profil"
            class="file-input m-2">
            <label for="foto_profil" class="file-input-label">Upload Foto Disini</label>
          </div>
        </div>
        <div class="flex flex-row gap-[125px]">
          <label for="gender" class="font-bold">Gender</label>
          <select class="w-64 bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 p-2 rounded-full text-xs h-10" name="gender" id="gender" 
          value="{{ $currentuser->gender }}" required>
          @foreach (['Laki-Laki', 'Perempuan'] as $gender)
            <option value="{{ $gender }}" @selected(old('gender', $currentuser->gender) == $gender)>{{ $gender }}</option>
          @endforeach
          </select>
        </div>
      </div>
      <div class="flex flex-row mb-3 w-full gap-6">
        <div class="flex flex-row gap-3">
          <label for="nama" class="flex font-bold items-center">Provinsi</label>
          @php
          $SelectedProvinceCode = old('province_code', $currentuser->province_code);
          @endphp
          <select class="bg-[#EEEEEE] w-40 p-2 rounded-full text-xs h-10 focus:border-[#48B477] focus:ring-0" 
          name="province_code" id="province" required>
            @foreach ($provinces as $province)
            <option value="{{ $province->id }}" @if($SelectedProvinceCode==$province->id) selected @endif>{{ $province->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-row gap-3">
          <label for="nama" class="flex font-bold items-center">Kabupaten</label>
          @php
          $SelectedCityCode = old('city_code', $currentuser->city_code);
          @endphp
          <select class="bg-[#EEEEEE] w-40 p-2 rounded-full text-xs h-10 focus:border-[#48B477] focus:ring-0" 
          name="city_code" id="city" required>
            @foreach ($cities as $city)
            <option value="{{ $city->id }}" data-province="{{ $city->province_code }}" @if($SelectedCityCode==$city->id) selected @endif> {{ $city->name }} </option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-row gap-3">
          <label for="nama" class="flex font-bold items-center">Kecamatan</label>
          @php
          $SelectedDistrictCode = old('district_code', $currentuser->district_code);
          @endphp
          <select class="bg-[#EEEEEE] w-40 p-2 rounded-full text-xs h-10 focus:border-[#48B477] focus:ring-0" 
          name="district_code" id="district" required>
            @foreach ($districts as $district)
            <option value="{{ $district->id }}" data-city="{{ $district->city_code }}" @if($SelectedDistrictCode==$district->id) selected @endif> {{ $district->name }} </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="flex flex-row mb-6 w-full gap-4">
        <label for="alamat" class="flex font-bold items-center">Alamat</label>
        <input id="alamat" name="alamat" type="text" placeholder="Alamat Lengkap" value="{{ $currentuser->alamat }}"
        class="bg-[#EEEEEE] focus:border-[#48B477] focus:ring-0 font-light rounded-full flex w-64" required></input>
      </div>
      <div class="flex flex-row gap-5 font-semibold text-white text-base">
        <button type="submit" class="text-[#48B477] border-2 border-[#48B477] w-32 flex justify-center p-2 rounded-xl bg-[#FFFFFF]
        hover:bg-[#E5E5E5] hover:scale-105 transition-all duration-100">Simpan</button>
        <button type="button" class="w-32 flex justify-center p-2 rounded-xl bg-[#FF0000]
        hover:bg-[#E50000] hover:scale-105 transition-all duration-100"><a href="/profil">Batal</a></button>
      </div>
    </div>
  </form>
</div>

<script src="{{ url('/assets/js/dropdown-places.js')}}"></script>

@endsection