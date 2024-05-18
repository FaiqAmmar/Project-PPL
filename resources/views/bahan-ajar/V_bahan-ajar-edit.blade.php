@extends('master-layout.navbarDashboardBahanAjar')
@section('title', 'Edit Bahan Ajar')
@section('content')

<div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <div class="flex items-center justify-between px-14 pt-8">
    <div class="flex items-center justify-start rtl:justify-end">
      <span class="text-3xl font-semibold">Detail Ajuan Bahan Ajar</span>
    </div>
  </div>
  <div class="relative h-96 overflow-y-auto mt-4 px-14">
    <table class="text-xs w-full text-center rtl:text-right table-auto">
      <thead class="font-semibold text-center text-sm">
        <tr>
          <th scope="col" class="px-2 py-2 w-10">No</th>
          <th scope="col" class="px-2 py-2 w-auto">Ajuan</th>
          <th scope="col" class="px-2 py-2 w-52">Tanggal</th>
          <th scope="col" class="px-2 py-2 w-52">Edit</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($currentBahanAjar as $index => $tablemodul)
        <tr>
          <td class="px-2 py-2">{{ $index + 1 }}</td>
          <td class="px-2 py-2">{{ $currentBahanAjar->ajuan }}</td>
          <td class="px-2 py-2">{{ $tablemodul->created_at->format('j F Y') }}</td>
          <td class="px-2 py-2">Pemerintah</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection