<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
        }
        .container {
            width: 350px;
            margin: 100px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
        }
        .link {
            text-align: center;
            margin-top: 10px;
        }
        .link a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Đăng nhập</h2>

    <!-- Hiển thị lỗi -->
    <?php if (!empty($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <!-- Form login -->
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Nhập email" required>
        <input type="password" name="password" placeholder="Nhập mật khẩu" required>

        <button type="submit">Đăng nhập</button>
    </form>

    <div class="link">
        <p>Chưa có tài khoản?</p>
        <a href="index.php?url=register">Đăng ký</a>
    </div>
</div>

</body>
</html>