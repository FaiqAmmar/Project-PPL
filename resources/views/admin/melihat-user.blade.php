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
          <img class="w-8 h-8 rounded-full" src="{{ url('logo.png') }}" alt="logo">
          <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="dashboard-modul-admin">Dashboard</a>
            <a class="ml-10 self-center text-xl font-semibold sm:text-base whitespace-nowrap hover:underline underline-offset-8 text-black" href="fitur-edukasi-admin">Edukasi</a>
        </div>
        <div class="flex items-center ">
          <span class="mr-4 self-center text-xl font-semibold sm:text-base whitespace-nowrap text-black">Selamat Datang, Faiq Ammar</span>
          <a class="group" href="profil-admin">
            <img class="w-8 h-8 rounded-full" src="{{ url('admin.jpg') }}" alt="admin-pic">
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
          <img class="self-center w-32 h-32 rounded-full" src="{{ url('/admin.jpg') }}" alt="admin-pic">
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
      <div class="relative overflow-x-auto mt-4">
        <table class="text-xs w-full text-left rtl:text-right">
          <thead class="font-bold text-white bg-[#365486]">
            <tr>
              <th scope="col" class="px-2 py-2">Nama</th>
              <th scope="col" class="px-2 py-2">Email</th>
              <th scope="col" class="px-2 py-2">Password</th>
              <th scope="col" class="px-2 py-2">Nomor Handphone</th>
              <th scope="col" class="px-2 py-2">Gender</th>
              <th scope="col" class="px-2 py-2">Alamat</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Abyan Athar</td>
              <td class="px-2 py-2">abyanath12@gmail.com</td>
              <td class="px-2 py-2">abyanathar12</td>
              <td class="px-2 py-2">089872618187</td>
              <td class="px-2 py-2">Laki-Laki</td>
              <td class="px-2 py-2">Jl. Rembangan 18 Kemuning lor, Arjasa, Jember Jawa Timur</td>
            </tr>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Muhammad Tri</td>
              <td class="px-2 py-2">muhtri@gmail.com</td>
              <td class="px-2 py-2">Tri12345678</td>
              <td class="px-2 py-2">082143233069</td>
              <td class="px-2 py-2">Laki-Laki</td>
              <td class="px-2 py-2">Jl. Ahmad Yani, Banyuwangi, Jawa Timur</td>
            </tr>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Sri Ayu</td>
              <td class="px-2 py-2">sriayu@gmail.com</td>
              <td class="px-2 py-2">sri9868</td>
              <td class="px-2 py-2">085249693948</td>
              <td class="px-2 py-2">Perempuan</td>
              <td class="px-2 py-2">Jl Dewi Rengganis, Krucil, Probolinggo, Jawa Timur</td>
            </tr>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Dewi Putri</td>
              <td class="px-2 py-2">dewiiput@gmail.com</td>
              <td class="px-2 py-2">Dewieeeput</td>
              <td class="px-2 py-2">085776422447</td>
              <td class="px-2 py-2">Perempuan</td>
              <td class="px-2 py-2">Jln Manggis 20B, Kaliwates, Jember, Jawa Timur</td>
            </tr>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Farouk Rais</td>
              <td class="px-2 py-2">faroukr@gmail.com</td>
              <td class="px-2 py-2">Farrais9</td>
              <td class="px-2 py-2">085338534457</td>
              <td class="px-2 py-2">Laki-Laki</td>
              <td class="px-2 py-2">Jln Manggis 7, Tenggrang, Bondowoso, Jawa Timur</td>
            </tr>
            <tr class="bg-white border-b ">
              <td class="font-semibold underline px-2 py-2">Achmad Fadjar</td>
              <td class="px-2 py-2">achfadjar@gmail.com</td>
              <td class="px-2 py-2">Fajarsenja</td>
              <td class="px-2 py-2">081219550857</td>
              <td class="px-2 py-2">Laki-Laki</td>
              <td class="px-2 py-2">Jln Basuki 20, Krucil, Probolinggo, Jawa Timur</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>
</html>