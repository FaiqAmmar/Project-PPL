@extends('master-layout.navbarDashboardProfil')
@section('title', 'Melihat Pemerintah')
@section('content')

<div class="bg-[#D6E8EE] rounded px-14 pt-12">
  <span class="text-3xl font-semibold">Akun Pemerintah</span>
  <div class="relative overflow-x-auto mt-4">
    <table class="text-xs w-full text-left rtl:text-right">
      <thead class="font-bold text-white bg-[#365486]">
        <tr>
          <th scope="col" class="px-2 py-2">Nama</th>
          <th scope="col" class="px-2 py-2">Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($gov as $seegov)
        <tr class="bg-white border-b ">
          <td class="font-semibold underline px-2 py-2">{{ $seegov->nama }}</td>
          <td class="px-2 py-2">{{ $seegov->email }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection