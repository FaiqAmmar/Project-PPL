@extends('master-layout.navbarDashboardProfil')
@section('title', 'Edit Profil')
@section('content')

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