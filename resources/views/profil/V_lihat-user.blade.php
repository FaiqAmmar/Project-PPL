@extends('master-layout.navbarDashboardProfil')
@section('title', 'Melihat Pengguna')
@section('content')

<div class="bg-[#D6E8EE] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Akun Pengguna</span>
  <div class="relative overflow-x-auto mt-4">
    <table class="text-xs w-full text-left rtl:text-right">
      <thead class="font-bold text-white bg-[#365486]">
        <tr>
          <th scope="col" class="px-2 py-2">Nama</th>
          <th scope="col" class="px-2 py-2">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $seeuser)
        <tr class="bg-white border-b ">
          <td class="font-semibold underline px-2 py-2">{{ $seeuser->nama }}</td>
          <td class="px-2 py-2">{{ $seeuser->email }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection