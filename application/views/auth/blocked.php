<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Access Forbidden</title>

    <link href="<?=base_url('assets/');?>img/simrs.png" rel="icon">

    <!-- Fonts & Icons -->
    <link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">

    <!-- SB Admin 2 -->
    <link href="<?=base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #2e86de, #54a0ff);
            color: #fff;
        }
        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
        .error-code {
            font-size: 8rem;
            font-weight: 900;
            color: #fff;
            text-shadow: 4px 4px rgba(0, 0, 0, 0.15);
        }
        .error-icon {
            font-size: 4rem;
            color: #ff6b6b;
            margin-bottom: 15px;
        }
        .error-message {
            font-size: 1.3rem;
            margin-bottom: 10px;
        }
        .error-desc {
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 25px;
        }
        .btn-custom {
            background-color: #ff6b6b;
            color: white;
            font-weight: bold;
            padding: 10px 25px;
            border-radius: 30px;
            transition: 0.3s ease;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #ee5253;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>

<body>

    <div class="error-container">
        <div class="error-icon"><i class="fas fa-ban"></i></div>
        <div class="error-code">404</div>
        <p class="error-message">Halaman Tidak Ditemukan</p>
        <p class="error-desc">Oops! Sepertinya Anda tersesat...</p>
        <a href="<?=base_url('auth');?>" class="btn-custom"><i class="fas fa-home"></i> Kembali ke Halaman Utama</a>
    </div>

    <!-- JS -->
    <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=base_url('assets/');?>js/sb-admin-2.min.js"></script>

</body>

</html>
