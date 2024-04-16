<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akun Pengguna</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="output.css">
</head>
<body class="bg-[#365486]">

  <nav class="top-0 w-full bg-[#7FC7D9]">
    <div class="px-9 py-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <img class="w-8 h-8 rounded-full" src="{{ asset('storage/logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="dashboard-modul-admin">Dashboard</a>
            <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="fitur-edukasi-admin">Edukasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Faiq Ammar</span>
          <a class="group" href="profil-admin">
            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/admin.jpg') }}" alt="admin-pic">
            <hr class="opacity-0 group-hover:opacity-100 mt-2 border border-black rounded">
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="grid grid-cols-[19%_auto] gap-x-7 mx-4 mt-4 mb-4">
    <div class="bg-[#7FC7D9] rounded px-8 py-[22px]">
      <div class="grid grid-rows-[240px_200px]">
        <div class="flex flex-col justify-center">
          <img class="self-center w-32 h-32 rounded-full" src="{{ asset('storage/admin.jpg') }}" alt="admin-pic">
          <span class="self-center mt-4 text-2xl font-semibold sm:text-base whitespace-nowrap text-black">Faiq Ammar</span>
          <hr class="self-center my-2 w-24 border border-black rounded">
          <span class="self-center text-xl font-slight sm:text-base whitespace-nowrap text-black">Admin</span>
        </div>
        <div class="flex flex-col font-semibold pt-3 text-base gap-y-2 justify-center">
        <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl"><a href="melihat-gov">Akun Pemerintah</a></button>
          <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl"><a href="melihat-user">Akun Pengguna</a></button>
          <button class="bg-[#D6E8EE] w-[140px] h-[60px] justify-center self-center rounded-xl">Edit</button>
          <button class="bg-[#FF0000] w-[140px] h-[60px] justify-center self-center rounded-xl text-white">Logout</button>
        </div>
      </div>
    </div>
    <div class="bg-[#D6E8EE] rounded px-14 pt-12">
      <span class="text-3xl font-semibold">Akun Pengguna</span>
      <div class="bg-white h-[325px]">
        <table class="table-fixed gap-x-2">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Password</th>
              <th>Nomor Handphone</th>
              <th>Gender</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Abyan Athar</td>
              <td>abyanath12@gmail.com</td>
              <td>abyanathar12</td>
              <td>089872618187</td>
              <td>Laki-Laki</td>
              <td>Jl. Rembangan 18 Kemuning lor, Arjasa, Jember Jawa Timur</td>
            </tr>
            <tr>
              <td>Witchy Woman</td>
              <td>The Eagles</td>
              <td>1972</td>
            </tr>
            <tr>
              <td>Shining Star</td>
              <td>Earth, Wind, and Fire</td>
              <td>1975</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>