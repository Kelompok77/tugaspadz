<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Sederhana</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
            background: #f4f4f4;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #1f2937;
            padding: 16px 40px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .navbar .logo {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .navbar .logo span {
            color: #38bdf8;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: #e5e7eb;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 0%;
            height: 2px;
            background-color: #38bdf8;
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: #38bdf8;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .navbar .btn {
            background-color: #38bdf8;
            color: #1f2937;
            padding: 8px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .navbar .btn:hover {
            background-color: #0ea5e9;
        }

        /* Hamburger menu untuk mobile */
        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
        }

        .menu-toggle span {
            width: 26px;
            height: 3px;
            background-color: #ffffff;
            border-radius: 2px;
        }

        /* Konten contoh di bawah navbar */
        .content {
            padding: 60px 40px;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            color: #374151;
        }

        .content h1 {
            margin-bottom: 16px;
            color: #1f2937;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                position: absolute;
                top: 64px;
                left: 0;
                width: 100%;
                background-color: #1f2937;
                flex-direction: column;
                align-items: center;
                gap: 0;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }

            .nav-links.active {
                max-height: 400px;
            }

            .nav-links li {
                width: 100%;
                text-align: center;
            }

            .nav-links a {
                display: block;
                padding: 16px 0;
                width: 100%;
            }

            .navbar .btn {
                display: none;
            }

            .menu-toggle {
                display: flex;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">XII<span>RPL</span></div>

        <ul class="nav-links" id="navLinks">
            <li><a href="#">Beranda</a></li>
            <li><a href="profil">Profil Jurusan</a></li>
            <li><a href="mapel">Daftar Mapel</a></li>
            <li><a href="guru">Data Guru</a></li>
            <li><a href="kontak">Kontak</a></li>
        </ul>

        <div class="menu-toggle" onclick="document.getElementById('navLinks').classList.toggle('active')">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    {{-- <div class="content">
  <h1>Selamat Datang di Website Jurusan</h1>
  <p>Ini adalah contoh isi halaman di bawah navbar. Coba perkecil lebar browser untuk melihat tampilan navbar responsive dengan menu hamburger.</p>
</div> --}}


</body>

</html>
