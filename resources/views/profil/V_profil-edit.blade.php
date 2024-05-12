@extends('master-layout.navbarDashboardProfil')
@section('title', 'Edit Profil')
@section('content')

<div class="bg-[#D6E8EE] rounded px-14 pt-12 pb-4">
  <span class="text-3xl font-semibold">Edit Profil</span>
  <form action="{{ route('update.profil', $currentuser->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="py-6 text-lg h-auto">
      <div class="grid grid-cols-[25%_75%] mb-4">
        <label for="nama" class="font-bold">Nama</label>
        <div>
          <input id="nama" name="nama" type="text" placeholder="Nama Lengkap" value="{{ $currentuser->nama }}"
          class="bg-transparent focus:border-black focus:ring-0 font-light flex w-full" required></input>
          <hr class="border border-black rounded">
        </div>
      </div>
      <div class="grid grid-cols-[25%_75%]">
        <label for="email" class="font-bold">Email</label>
        <div>
          <input id="email" name="email" type="text" placeholder="nama@email.com" value="{{ $currentuser->email }}"
          class="bg-transparent focus:border-black focus:ring-0 font-light flex w-full" required></input>
          <hr class="border border-black rounded">
        </div>
      </div>
      </div>
      <div class="grid grid-cols-[25%_75%] mb-4">
        <label for="nomor_handphone" class="font-bold">Nomor Handphone</label>
        <div>
          <input id="nomor_handphone" name="nomor_handphone" type="text" placeholder="08**********" value="{{ $currentuser->nomor_handphone }}"
          class="bg-transparent focus:border-black focus:ring-0 font-light flex w-full" required></input>
          <hr class="border border-black rounded">
        </div>
      </div>
      <div class="grid grid-cols-[25%_75%] mb-4">
        <label for="gender" class="font-bold">Gender</label>
        <select class="w-40 bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="gender" id="gender" 
        value="{{ $currentuser->gender }}"" required>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="grid grid-cols-[25%_75%] mb-4">
        <span class="font-bold">Alamat</span>
        <div class="flex flex-col">
          <div class="flex flex-row gap-4 mb-2">
            <div class="w-40 flex flex-col">
              <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="province_code">Provinsi</label>
              @php
                $SelectedProvinceCode = old('province_code', $currentuser->province_code);
              @endphp
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="province_code" id="province" required>
                @foreach ($provinces as $province)
                <option value="{{ $province->id }}" @if($SelectedProvinceCode==$province->id) selected @endif>{{ $province->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="w-40 flex flex-col">
              <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="city_code">Kabupaten</label>
              @php
              $SelectedCityCode = old('city_code', $currentuser->city_code);
              @endphp
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="city_code" id="city" required>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" data-province="{{ $city->province_code }}" @if($SelectedCityCode==$city->id) selected @endif> {{ $city->name }} </option>
                @endforeach
              </select>
            </div>
            <div class="w-40 flex flex-col">
              <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="district_code">Kecamatan</label>
              @php
              $SelectedDistrictCode = old('district_code', $currentuser->district_code);
              @endphp
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="district_code" id="district" required>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" data-city="{{ $district->city_code }}" @if($SelectedDistrictCode==$district->id) selected @endif> {{ $district->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="">Alamat Lengkap</label>
          <input id="alamat" name="alamat" type="text" placeholder="Alamat Lengkap" value="{{ $currentuser->alamat }}"
          class="bg-transparent focus:border-black focus:ring-0 font-light flex w-full" required></input>
          <hr class="border border-black rounded">
        </div>
      </div>
      <div class="flex flex-row gap-5 font-semibold text-white text-base justify-end">
        <button class="w-20 flex justify-center p-2 rounded-xl bg-[#FF0000]"><a href="/profil">Batal</a></button>
        <button type="submit" class="w-20 flex justify-center p-2 rounded-xl bg-[#1D46A6]">Simpan</button>
      </div>
    </div>
  </form>
</div>

<script src="{{ url('/assets/js/dropdown-places.js')}}"></script>

@endsection