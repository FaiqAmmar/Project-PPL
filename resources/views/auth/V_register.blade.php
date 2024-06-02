@extends('master-layout.public')
@section('title', 'Register')
@section('content')

<div class="bg-[#48B477]/[0.3] font-poppins flex justify-center items-center w-full h-full">
  @if ($roles_id == 2)
  <form class="mx-40 mt-12 mb-[38px] w-full h-full flex flex-col bg-[#F5F5F5] rounded-2xl" method="post" action="/register-user">\
  @csrf
    <div class="flex justify-center items-center text-3xl font-bold py-6">Registrasi Pengguna</div>
    <div class="flex flex-row gap-16 px-6">
      <div class="flex flex-col gap-3 w-1/2">
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="email">Email</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="email" name="email" type="email" placeholder="Contoh satria@email.com" oninvalid="this.setCustomValidity('Mohon Isi Kolom Email')" required>
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="password">Password</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="password" name="password" type="password" placeholder="Masukkan Password" oninvalid="this.setCustomValidity('Mohon Isi Kolom Password')" required>
        </div>
        <div class="flex flex-col"">
          <label class="mb-1 font-bold" for="nama">Nama</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="nama" name="nama" type="text" placeholder="contoh : Satria Belva Nararya" oninvalid="this.setCustomValidity('Mohon Isi Kolom Nama')" required>
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="nomor_handphone">Nomor Handphone</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="nomor_handphone" name="nomor_handphone" type="text" pattern="08\d{9,}" placeholder="contoh : 081230666004" oninvalid="this.setCustomValidity('Mohon Isi Kolom Nomor Handphone')" required>
        </div>
      </div>
      <div class="flex flex-col w-1/2">
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="gender">Gender</label>
          <select class="w-1/3 bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
          invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
          name="gender" id="gender" required>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="flex flex-col mt-2">
          <div class="flex flex-row gap-3 mb-4">
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Provinsi</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="province_code" id="province" required>
                <option value="">Provinsi</option>
                @foreach ($provinces as $province)
                <option value="{{ $province->id }}"> {{ $province->name }} </option>
                @endforeach
              </select>
            </div>
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Kabupaten</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="city_code" id="city" required>
                <option value="">Kabupaten</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" data-province="{{ $city->province_code }}"> {{ $city->name }} </option>
                @endforeach
              </select>
            </div>
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Kecamatan</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="district_code" id="district" required>
                <option value="">Kecamatan</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" data-city="{{ $district->city_code }}"> {{ $district->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <label class="mb-2 font-bold" for="">Alamat Lengkap</label>
          <textarea class=" bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs
          invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[rgb(72,180,119)]" 
          style="resize:none" name="alamat" id="alamat" cols="30" rows="6" placeholder="contoh : Tegal Besar" oninvalid="this.setCustomValidity('Mohon Isi Kolom Alamat')" required></textarea>
        </div>
      </div>
    </div>
    <div class="flex flex-col justify-center items-center gap-1 py-3 ">
      <button type="submit" 
      class="flex items-center w-auto justify-center mt-2 bg-[#48B477] px-28 py-2 rounded-xl text-white font-bold 
      hover:bg-[#39905f] hover:scale-105 transition">Daftar</button>
      <div class="flex justify-center text-xs mt-1">Sudah Punya Akun?<a 
        class="text-[#48B477] hover:font-bold hover:text-[#39905f] transition" href="login">&nbsp;Masuk Sekarang</a></div>
    </div>
  </form>
  @else
  <form class="mx-40 mt-14 mb-[54px] w-full h-full flex flex-col bg-[#F5F5F5] rounded-2xl" method="post" action="/register-gov">
  @csrf
    <div class="flex justify-center items-center text-3xl font-bold py-6">Registrasi Pemerintah</div>
    <div class="flex flex-row gap-16 px-6">
      <div class="flex flex-col gap-3 w-1/2">
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="email">Email</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="email" name="email" type="email" placeholder="Contoh satria@email.com" oninvalid="this.setCustomValidity('Mohon Isi Kolom Email')" required>
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="password">Password</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="password" name="password" type="password" placeholder="Masukkan Password" oninvalid="this.setCustomValidity('Mohon Isi Kolom Password')" required>
        </div>
        <div class="flex flex-col"">
          <label class="mb-1 font-bold" for="nama">Nama</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="nama" name="nama" type="text" placeholder="contoh : Satria Belva Nararya" oninvalid="this.setCustomValidity('Mohon Isi Kolom Nama')" required>
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="nomor_handphone">Nomor Handphone</label>
          <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]"
          id="nomor_handphone" name="nomor_handphone" type="text" pattern="08\d{9,}" oninvalid="this.setCustomValidity('Mohon Isi Kolom Nomor Handphone')" placeholder="contoh : 081230666004">
        </div>
      </div>
      <div class="flex flex-col w-1/2">
        <div class="flex flex-col">
          <label class="mb-1 font-bold" for="gender">Gender</label>
          <select class="w-1/3 bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
          invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
          name="gender" id="gender" required>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="flex flex-col mt-2">
          <div class="flex flex-row gap-3 mb-4">
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Provinsi</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="province_code" id="province" required>
                <option value="">Provinsi</option>
                @foreach ($provinces as $province)
                <option value="{{ $province->id }}"> {{ $province->name }} </option>
                @endforeach
              </select>
            </div>
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Kabupaten</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="city_code" id="city" required>
                <option value="">Kabupaten</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" data-province="{{ $city->province_code }}"> {{ $city->name }} </option>
                @endforeach
              </select>
            </div>
            <div class="w-1/4 flex flex-col">
              <label class="mb-2 font-bold" for="">Kecamatan</label>
              <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10
              invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
              name="district_code" id="district" required>
                <option value="">Kecamatan</option>
                @foreach ($districts as $district)
                <option value="{{ $district->id }}" data-city="{{ $district->city_code }}"> {{ $district->name }} </option>
                @endforeach
              </select>
            </div>
          </div>
          <label class="mb-2 font-bold" for="">Alamat Lengkap</label>
          <textarea class=" bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs
          invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-[#48B477]" 
          style="resize:none" name="alamat" id="alamat" cols="30" rows="6" placeholder="contoh : Tegal Besar" oninvalid="this.setCustomValidity('Mohon Isi Kolom Alamat')" required></textarea>
        </div>
      </div>
    </div>
    <div class="flex flex-col justify-center items-center gap-1 py-3 ">
      <button type="submit" 
      class="flex items-center w-auto justify-center mt-2 bg-[#48B477] px-28 py-2 rounded-xl text-white font-bold 
      hover:bg-[#39905f] hover:scale-105 transition">Daftar</button>
      <div class="flex justify-center text-xs mt-1">Sudah Punya Akun?<a 
        class="text-[#48B477] hover:font-bold hover:text-[#39905f] transition" href="login">&nbsp;Masuk Sekarang</a></div>
    </div>
  </form> 
  @endif
  
</div>

<script src="{{ url('/assets/js/dropdown-places.js')}}"></script>

@endsection