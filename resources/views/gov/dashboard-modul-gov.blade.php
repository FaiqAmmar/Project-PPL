<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Modul</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="output.css">
</head>
<body class="bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
        <img class="w-8 h-8 rounded-full" src="{{ url('logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap underline underline-offset-8 text-black" href="dashboard-modul-gov">Dashboard</a>
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="fitur-edukasi-gov">Edukasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Guntur Cahyadi</span>
          <a class="group" href="profil-gov">
            <img class="w-8 h-8 rounded-full" src="{{ url('gov.jpg') }}" alt="gov-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="h-[85vh] mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
  <div class="h- mx-4 mt-4 mb-4 rounded bg-[#D6E8EE]">
    <div class="flex items-center justify-between px-14 pt-8">
      <div class="flex items-center justify-start rtl:justify-end">
        <span class="text-3xl font-semibold">Modul Bahan Ajar</span>
      </div>
      <div class="flex items-center">
        <button class="flex p-2 bg-[#365486] hover:bg-[#304b78] rounded-full items-center justify-center">
          <img class="w-3 h-3" src="{{ url('tombol-tambah.png') }}" alt="button">
        </button>
      </div>
    </div>
    <div class="relative overflow-x-auto mt-4 px-14">
      <table class="text-xs w-full text-center rtl:text-right table-auto">
        <thead class="font-semibold text-center text-sm">
          <tr>
            <th scope="col" class="px-2 py-2 w-10">No</th>
            <th scope="col" class="px-2 py-2">Judul Modul</th>
            <th scope="col" class="px-2 py-2 w-96">Deskripsi Modul</th>
            <th scope="col" class="px-2 py-2">Video</th>
            <th scope="col" class="px-2 py-2">Tanggal upload</th>
            <th scope="col" class="px-2 py-2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <td class="px-2 py-2">1</td>
            <td class="px-2 py-2">Padi</td>
            <td class="px-2 py-2 text-justify">Padi merupakan salah satu tanaman budidaya terpenting dalam peradaban. Meskipun terutama mengacu pada jenis tanaman budidaya, padi juga digunakan untuk mengacu pada beberapa jenis dari marga yang sama, yang biasa disebut sebagai padi liar.</td>
            <td class="px-2 py-2">padi.mp4</td>
            <td class="px-2 py-2">25 Februari 2024</td>
            <td class="px-2 py-2 font-bold">Menunggu</td>
          </tr>
          <tr class="">
            <td class="px-2 py-2">2</td>
            <td class="px-2 py-2">Jagung</td>
            <td class="px-2 py-2 text-justify">Jagung adalah salah satu tanaman pangan penghasil karbohidrat yang terpenting di dunia, selain gandum dan padi. Bagi penduduk Amerika Tengah dan Selatan, bulir jagung adalah pangan pokok, sebagaimana bagi sebagian penduduk Afrika dan beberapa daerah di Indonesia.</td>
            <td class="px-2 py-2">jagung.mp4</td>
            <td class="px-2 py-2">30 Januari 2023</td>
            <td class="px-2 py-2 font-bold text-[#04AA6D]">Disetujui</td>
          </tr>
          <tr class="">
            <td class="px-2 py-2">3</td>
            <td class="px-2 py-2">Cabai</td>
            <td class="px-2 py-2 text-justify">Cabai adalah buah dan tumbuhan anggota genus Capsicum. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguatatannya. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguat rasa untuk makanan.</td>
            <td class="px-2 py-2">cabai.mp4</td>
            <td class="px-2 py-2">13 Juli 2023</td>
            <td class="px-2 py-2 font-bold text-[#FF0000]">Ditolak</td>
          </tr>
          <tr class="">
            <td class="px-2 py-2">4</td>
            <td class="px-2 py-2">Ubi</td>
            <td class="px-2 py-2 text-justify">Umbi adalah organ tumbuhan yang mengalami perubahan ukuran dan bentuk sebagai akibat perubahan fungsinya.</td>
            <td class="px-2 py-2">ubi.mp4</td>
            <td class="px-2 py-2">15 April 2022</td>
            <td class="px-2 py-2 font-bold text-[#04AA6D]">Disetujui</td>
          </tr>
      </table>
    </div>
  </div>

</body>
</html>