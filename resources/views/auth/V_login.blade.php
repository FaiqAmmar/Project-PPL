@extends('master-layout.public')
@section('title', 'Login')
@section('content')

<section class="w-screen h-screen bg-[#48B477]/[0.3] flex justify-center items-center gap-8">
  <div class="scale-75">
    <h1 class="text-7xl mb-6 font-bold">Silahkan Masuk</h1>
    <form action="/login" method="POST" class="flex flex-col justify-center">
      @csrf
      <label class="text-3xl font-bold ml-2 mb-4" for="email">Email</label>
      <input class="h-14 rounded-xl pl-7 focus:outline-none focus:ring-1 focus:ring-[#48B477] focus:border-[#48B477]" oninvalid="this.setCustomValidity('Mohon Isi Kolom Email')"
      id="email" type="email" value="{{ old('email') }}" name="email" placeholder="contoh : satriabelvanararya@gmail.com" required>
      <div class="flex justify-between items-baseline mt-7">
        <label class="text-3xl font-bold ml-2 mb-4" for="password">Password</label>
      </div>
      <input class="h-14 rounded-xl pl-7 focus:outline-none focus:ring-1 focus:ring-[#48B477] focus:border-[#48B477]"  oninvalid="this.setCustomValidity('Mohon Isi Kolom Password')"
      id="password" type="password" name="password" placeholder="*******" required>
      <button name="submit" type="submit" class="mt-16 w-full h-14 bg-[#48B477] text-white text-xl font-bold rounded-lg hover:bg-[#39905f] hover:scale-105 hover:shadow-2xl transition">
        Masuk
      </button>
    </form>
    <h5 class="text-xl mt-2 mb-12">Tidak Punya Akun? <a class="text-[#48B477] hover:font-bold hover:text-[#39905f] transition" href="register-role">Daftar Sekarang</a></h5>
  </div>
  <div class="flex justify-center items-center ml-11 scale-75">
    <img class="h-[500px] rounded-full" src="{{ url('assets/img/logo.png') }}" alt="Logo Agro Edu">
  </div>
</section>

@endsection