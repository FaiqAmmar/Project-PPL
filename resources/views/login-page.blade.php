<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-[#D6E8EE] flex justify-center items-center h-svh font-poppins gap-8 scale-75">
    <div>
        <h1 class="text-7xl font-bold">Silahkan Masuk</h1>
        <h5 class="text-xl font-bold mb-12">Tidak Punya Akun? <a class="text-blue-700" href="register-page">Daftar Sekarang</a></h5>
        <form action="/login-page" method="POST" class="flex flex-col justify-center">
            @csrf
            <label class="text-3xl font-bold ml-2 mb-4" for="email">Email</label>
            <input class="h-14 rounded-xl pl-7 focus:outline-none focus:ring-1 focus:ring-slate-700" id="email" type="email" value="{{ old('email') }}" name="email" placeholder="contoh : satriabelvanararya@gmail.com" required>
            <div class="flex justify-between items-baseline mt-7">
                <label class="text-3xl font-bold ml-2 mb-4" for="password">Password</label>
            </div>
            <input class="h-14 rounded-xl pl-7 focus:outline-none focus:ring-1 focus:ring-slate-700" id="password" type="password" name="password" placeholder="*******" required>
            <button name="submit" type="submit" class="mt-16 w-full h-14 bg-[#1D46A6] text-white text-xl font-bold rounded-lg hover:bg-blue-950 hover:scale-105 hover:shadow-2xl transition">
                Masuk
            </button>
        </form>
    </div>
    <div class="flex justify-center items-center ml-11">
        <img class="h-[500px] rounded-full" src="{{ url('logo.png') }}" alt="Logo Agro Edu">
    </div>
</body>
</html>