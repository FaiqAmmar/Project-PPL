@extends('master-layout.public')
@section('title', 'Register')
@section('content')

<section class="bg-[#FFFFFF] font-poppins flex justify-center items-center w-screen h-screen">
  <form class="ml-10" action="tes.html" style="display: grid;
                grid-template-areas: '. title title .'
                                    'nama nama gender gender'
                                    'email email alamat alamat'
                                    'password password alamat alamat'
                                    'telepon telepon alamat alamat'
                                    '. button button .'
                                    '. login login .';
                column-gap: 5rem;
                row-gap: 10px;
                width: 900px;">
    <div class="mx-auto text-3xl font-bold mb-6" style="grid-area:title;">Registrasi</div>
    <div class="flex flex-col"  style="grid-area: nama;">
      <label class="ml-1 font-bold" for="nama">Nama</label>
      <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 focus:outline-none focus:ring-1 focus:ring-slate-700" id="nama" type="text" placeholder="contoh : Satria Belva Nararya" required>
    </div>
    <div class="flex flex-col"  style="grid-area: telepon;">
      <label class="ml-1 font-bold" for="nomorTelepon">Nomor Telepon</label>
      <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-slate-700" id="nomorTelepon" type="tel" pattern="08\d{9,}" placeholder="contoh : 081230666004">
    </div>
    <div class="flex flex-col"  style="grid-area: email;">
      <label class="ml-1 font-bold" for="email">Email</label>
      <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-slate-700" id="email" type="email" placeholder="contoh : Satria Belva Nararya" required>
    </div>
    <div class="flex flex-col"  style="grid-area: gender;">
      <label class="ml-1 font-bold" for="gender">Gender</label>
      <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="gender" id="gender" required>
        <option value="laki">Laki Laki</option>
        <option value="Perempuan">Perempuan</option>
      </select>
    </div>
    <div class="flex flex-col"  style="grid-area: password;">
      <label class="ml-1 font-bold" for="">Password</label>
      <input class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" type="password" placeholder="contoh : *******" required>
    </div>
    <div class="flex flex-col"  style="grid-area: alamat;">
      <label class="ml-1 mb-1 font-bold">Alamat</label>
      <div class="flex flex-row gap-3 mb-1">
        <div class="w-1/3 flex flex-col">
          <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="">Provinsi</label>
          <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="provinsi" id="provinsi" required>
            <option value="Test">Test</option>
            <option value="Test1">Test1</option>
          </select>
        </div>
        <div class="w-1/3 flex flex-col">
          <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="">Kabupaten/Kota</label>
          <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="provinsi" id="provinsi" required>
            <option value="Test">Test</option>
            <option value="Test1">Test1</option>
          </select>
        </div>
        <div class="w-1/3 flex flex-col">
          <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="">Kecamatan</label>
          <select class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs h-10" name="provinsi" id="provinsi" required>
            <option value="Test">Test</option>
            <option value="Test1">Test1</option>
          </select>
        </div>
      </div>
      <label class="ml-1 mb-1 text-xs font-bold text-[#666666]" for="">Alamat Lengkap</label>
      <textarea class="bg-[#EEEEEE] border-0 p-2 rounded-lg text-xs" style="resize:none"
      name="alamat-lengkap" id="alamat-lengkap" cols="30" rows="6" placeholder="contoh : Tegal Besar" required></textarea>
    </div>
    <button style="grid-area: button;" type="submit" 
    class="flex items-center justify-center mt-2 bg-[#1D46A6] h-10 rounded-xl text-white font-bold tracking-wide hover:bg-blue-950 hover:scale-105 hover:shadow-2xl transition">Daftar</button>
    <div style="grid-area: login;" class="flex justify-center text-xs mt-1">Sudah Punya Akun?<a class="text-blue-500 hover:font-bold hover:text-blue-900 transition" href="login"> Masuk Sekarang</a></div>
  </form>    
</section>

@endsection