<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Registrasi</title>
</head>
<body class="bg-[#D6E8EE] font-poppins flex flex-col justify-center items-center h-svh">
    <div class="mx-auto text-3xl font-bold mb-6">Registrasi</div>
    <form action="tes.html" style="display: grid;
                                    grid-template-areas: 'nama telepon'
                                                        'email gender'
                                                        'password alamat'
                                                        'button button';
                                    column-gap: 5rem;
                                    row-gap: 10px;
                                    width: 750px;
                                    height: 250px;">
        <div class="flex flex-col"  style="grid-area: nama;">
            <label class="ml-1 font-semibold" for="nama">Nama</label>
            <input class="border p-2 rounded-lg text-xs h-10 focus:outline-none focus:ring-1 focus:ring-slate-700" id="nama" type="text" placeholder="contoh : Satria Belva Nararya" required>
        </div>
        <div class="flex flex-col"  style="grid-area: telepon;">
            <label class="ml-1 font-semibold" for="nomorTelepon">Nomor Telepon</label>
            <input class="border p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-slate-700" id="nomorTelepon" type="tel" pattern="08\d{9,}" placeholder="contoh : 081230666004">
        </div>
        <div class="flex flex-col"  style="grid-area: email;">
            <label class="ml-1 font-semibold" for="email">Email</label>
            <input class="border p-2 rounded-lg text-xs h-10 invalid:focus:border-red-600 invalid:focus:ring-red-500 focus:outline-none focus:ring-1 focus:ring-slate-700" id="email" type="email" placeholder="contoh : Satria Belva Nararya" required>
        </div>
        <div class="flex flex-col"  style="grid-area: gender;">
            <label class="ml-1 font-semibold" for="gender">Gender</label>
            <select class="border p-2 rounded-lg text-xs h-10" name="gender" id="gender" required>
                <option value="laki">Laki Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="flex flex-col"  style="grid-area: password;">
            <label class="ml-1 font-semibold" for="">Password</label>
            <input class="border p-2 rounded-lg text-xs h-10" type="password" placeholder="contoh : *******" required>
        </div>
        <div class="flex flex-col"  style="grid-area: alamat;">
            <label class="ml-1 font-semibold" for="">Alamat</label>
            <input class="border p-2 rounded-lg text-xs h-10" type="text" placeholder="contoh : Tegal Besar" required>
        </div>
        <button style="grid-area: button;" type="submit" class="mt-2 bg-[#1D46A6] h-10 rounded-xl text-white font-semibold tracking-wide hover:bg-blue-950 hover:scale-105 hover:shadow-2xl transition col-span-2">Daftar</button>
    </form>
    <p class="text-xs mt-7">Sudah Punya Akun?<a class="text-blue-500 hover:font-bold hover:text-blue-900 transition" href="login-page"> Masuk Sekarang</a></p>
</body>
</html>