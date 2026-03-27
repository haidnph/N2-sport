<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<?php
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>

<body class="bg-white">

<!-- HEADER -->
<div class="max-w-7xl mx-auto flex justify-between items-center p-5">
    
    <h1 class="text-2xl font-bold">Giỏ hàng</h1>

    <a href="index.php" class="text-blue-500">← Quay lại</a>
</div>

<main class="max-w-7xl mx-auto">

    <h2 class="font-extrabold text-3xl p-5">
        YOUR CART (<?= count($cart) ?> items)
    </h2>

    <div class="flex justify-between gap-5">

        <!-- CART LIST -->
        <div class="w-[65%] border border-gray-400 rounded-2xl p-5">

            <?php if (empty($cart)): ?>
                <p class="text-center text-gray-500">Giỏ hàng trống</p>
            <?php else: ?>

                <?php foreach ($cart as $index => $item): 
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                ?>

                <div class="flex items-center gap-5 border-b py-5">

                    <img src="<?= $item['image'] ?>" 
                         class="rounded-xl w-[100px]">

                    <div class="flex-1">
                        <h3 class="font-bold"><?= $item['name'] ?></h3>
                        <p class="text-gray-500">
                            Size: <?= $item['size'] ?> | Color: <?= $item['color'] ?>
                        </p>
                        <p class="font-bold">$<?= $item['price'] ?></p>
                    </div>

                    <!-- Quantity -->
                    <div class="flex items-center gap-2">
                        <a href="index.php?url=decrease&id=<?= $index ?>" 
                           class="px-2 bg-gray-200">-</a>

                        <span><?= $item['quantity'] ?></span>

                        <a href="index.php?url=increase&id=<?= $index ?>" 
                           class="px-2 bg-gray-200">+</a>
                    </div>

                    <!-- Remove -->
                    <a href="index.php?url=remove&id=<?= $index ?>" 
                       class="text-red-500 ml-3">
                        <i class="fa-solid fa-trash"></i>
                    </a>

                </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <!-- SUMMARY -->
        <?php
        $discount = $total * 0.2;
        $delivery = 10;
        $final = $total - $discount + $delivery;
        ?>

        <div class="w-[35%] border border-gray-400 rounded-3xl p-5 h-fit">

            <h2 class="font-bold text-2xl">Order Summary</h2>

            <div class="flex flex-col gap-5 mt-5">

                <div class="flex justify-between">
                    <span>SubTotal</span>
                    <p class="font-bold">$<?= $total ?></p>
                </div>

                <div class="flex justify-between">
                    <span>Discount (-20%)</span>
                    <p class="font-bold">$<?= $discount ?></p>
                </div>

                <div class="flex justify-between">
                    <span>Delivery</span>
                    <p class="font-bold">$<?= $delivery ?></p>
                </div>

                <hr>

                <div class="flex justify-between text-lg">
                    <span>Total</span>
                    <p class="font-bold">$<?= $final ?></p>
                </div>

            </div>

            <button class="w-full mt-6 bg-black text-white p-3 rounded-3xl">
                Checkout
            </button>

        </div>

    </div>

</main>

</body>
</html>