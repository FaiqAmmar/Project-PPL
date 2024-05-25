@extends('master-layout.navbarDashboardBahanAjar')
@section('title', 'Detail Bahan Ajar')
@section('content')

<div class="h-[85vh] mx-4 mt-3 mb-2.5 rounded bg-[#FFFFFF]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold text-[#48B477]">Detail Ajuan Bahan Ajar</span>
    </div>
  </div>
  <div class="relative h-96 overflow-y-auto mt-4 px-14">
    <table class="text-xs w-full text-center rtl:text-right table-auto">
      <thead class="font-semibold text-center text-sm text-[#EEEEEE] bg-[#48B477] border-x border-[#48B477]">
        <tr>
          <th scope="col" class="px-2 py-2 w-10">No</th>
          <th scope="col" class="px-2 py-2 w-auto">Ajuan</th>
          <th scope="col" class="px-2 py-2 w-52">Nama</th>
          <th scope="col" class="px-2 py-2 w-52">Aktor</th>
          <th scope="col" class="px-2 py-2 w-52">Tanggal</th>
        </tr>
      </thead>
      <tbody class="border-b border-[#48B477]">
        @foreach ($detail as $index => $tablemodul)
        <tr class="border-b border-[#48B477]">
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $index + 1 }}</td>
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->ajuan }}</td>
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->user->nama }}</td>
          @if ($tablemodul->user->roles_id == 3)
          <td class="px-2 py-2 border-x border-[#48B477]">Pemerintah</td>
          @else
          <td class="px-2 py-2 border-x border-[#48B477]">Pengguna</td>
          @endif
          <td class="px-2 py-2 border-x border-[#48B477]">{{ $tablemodul->created_at->format('j F Y') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection