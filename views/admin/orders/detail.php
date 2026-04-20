<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex items-center justify-between">
        <a href="index.php?url=admin-orders" 
           class="flex items-center gap-2 text-slate-400 hover:text-slate-900 transition-all font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-chevron-left text-[10px]"></i> Quay lại danh sách
        </a>
        <div class="flex gap-2">
            <span class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest italic shadow-lg shadow-blue-200">
                Mã đơn: #<?= $order['order_id'] ?>
            </span>
        </div>
    </div>

    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <div class="lg:col-span-2 bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 p-10 relative overflow-hidden">
                <h2 class="text-xl font-black uppercase italic tracking-tight text-slate-800 mb-8 flex items-center gap-3">
                    <i class="fa-solid fa-address-card text-blue-600"></i> Thông tin nhận hàng
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Người nhận</span>
                            <p class="font-black text-slate-800 uppercase italic text-lg"><?= htmlspecialchars($order['receiver_name'] ?? 'Khách vãng lai') ?></p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Số điện thoại</span>
                            <p class="font-bold text-slate-700 italic tracking-wider"><?= htmlspecialchars($order['phone'] ?? 'Chưa cung cấp') ?></p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Địa chỉ giao hàng</span>
                        <p class="font-medium text-slate-600 leading-relaxed italic"><?= htmlspecialchars($order['address'] ?? 'N/A') ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-slate-900 rounded-[40px] shadow-xl p-10 text-white relative overflow-hidden group">
                <h2 class="text-xl font-black uppercase italic tracking-tight text-blue-400 mb-8">Vận đơn N2SPORT</h2>
                <div class="space-y-6">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 italic">Trạng thái</span>
                        <?php
                            $statusLabel = match($order['status']) {
                                'pending' => 'Chờ xử lý',
                                'shipping' => 'Đang giao',
                                'done' => 'Hoàn tất',
                                'cancel' => 'Đã hủy',
                                default => '??'
                            };
                        ?>
                        <span class="px-3 py-1 bg-white/10 rounded-full text-[10px] font-black uppercase italic text-blue-400 border border-blue-400/30">
                            <?= $statusLabel ?>
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 italic">Thanh toán</span>
                        <span class="font-black uppercase italic text-xs <?= $order['payment_status'] == 'paid' ? 'text-emerald-400' : 'text-orange-400' ?>">
                            <?= $order['payment_status'] == 'paid' ? 'Đã thanh toán' : 'Chưa trả tiền' ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden mb-8">
            <table class="w-full text-left">
                <tbody class="divide-y divide-slate-50">
                    <?php $sub_total = 0; foreach ($order['items'] as $i): 
                        $item_total = $i['quantity'] * $i['price'];
                        $sub_total += $item_total;
                    ?>
                    <tr class="hover:bg-slate-50/80 transition-all group">
                        <td class="px-8 py-5 flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden border border-slate-100 shadow-sm flex-shrink-0">
                                <img src="uploads/<?= htmlspecialchars($i['image'] ?? '') ?>" class="w-full h-full object-cover">
                            </div>
                            <span class="font-black text-slate-800 uppercase italic tracking-tight text-sm"><?= $i['product_name'] ?></span>
                        </td>
                        <td class="px-8 py-5 text-center font-black text-blue-600 italic">Size <?= $i['size_name'] ?? '-' ?></td>
                        <td class="px-8 py-5 text-center font-black text-slate-600">x<?= $i['quantity'] ?></td>
                        <td class="px-8 py-5 text-right font-black text-slate-900 italic text-base"><?= number_format($item_total) ?>₫</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot class="bg-blue-50/30">
                    <tr>
                        <td colspan="3" class="px-8 py-6 text-right text-xs font-black uppercase text-blue-600 italic">Tổng thanh toán:</td>
                        <td class="px-8 py-6 text-right font-black text-blue-600 italic text-2xl"><?= number_format($order['total_price']) ?>₫</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="flex flex-wrap items-center justify-between gap-6 bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
            
            <form action="index.php?url=admin-order-update-status&id=<?= $order['order_id'] ?>" method="post" class="flex flex-wrap items-center gap-4">
                <div class="flex flex-col gap-1">
                    <label class="text-[9px] font-black uppercase tracking-[2px] text-slate-400 ml-2 italic">Tiến trình vận đơn</label>
                    <div class="flex gap-2">
                        <select name="status" class="bg-slate-50 border-none rounded-xl px-4 py-3 text-xs font-black uppercase italic tracking-widest text-slate-700 focus:ring-2 focus:ring-blue-600 transition-all outline-none disabled:opacity-50"
                            <?= in_array($order['status'], ['done', 'cancel']) ? 'disabled' : '' ?>>
                            
                            <?php if($order['status'] == 'pending'): ?>
                                <option value="pending" selected>Chờ xử lý</option>
                            <?php endif; ?>

                            <?php if(in_array($order['status'], ['pending', 'shipping'])): ?>
                                <option value="shipping" <?= $order['status']=='shipping'?'selected':'' ?>>Đang giao hàng</option>
                            <?php endif; ?>

                            <?php if(in_array($order['status'], ['shipping', 'done'])): ?>
                                <option value="done" <?= $order['status']=='done'?'selected':'' ?>>Hoàn tất đơn</option>
                            <?php endif; ?>

                            <?php if(in_array($order['status'], ['pending', 'cancel'])): ?>
                                <option value="cancel" <?= $order['status']=='cancel'?'selected':'' ?>>Hủy bỏ đơn</option>
                            <?php endif; ?>
                        </select>

                        <?php if(!in_array($order['status'], ['done', 'cancel'])): ?>
                            <button type="submit" class="bg-slate-900 text-white px-6 py-3 rounded-xl font-black uppercase text-[10px] tracking-[2px] hover:bg-blue-600 transition-all shadow-lg shadow-blue-200/20">
                                Cập nhật tiến trình <i class="fa-solid fa-rotate-right ml-1"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>

            <div class="flex gap-3">
                <?php if($order['payment_status'] !== 'paid' && $order['status'] !== 'cancel'): ?>
                    <a href="index.php?url=admin-order-mark-paid&id=<?= $order['order_id'] ?>"
                       onclick="return confirm('Xác nhận đã nhận tiền?')"
                       class="bg-emerald-600 text-white px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-[2px] hover:bg-emerald-700 transition-all flex items-center gap-2">
                        <i class="fa-solid fa-money-bill-check text-base"></i> Đã thu tiền
                    </a>
                <?php endif; ?>

                <?php if($order['status'] == 'pending'): ?>
                    <a href="index.php?url=admin-order-cancel&id=<?= $order['order_id'] ?>"
                       onclick="return confirm('⚠️ N2SPORT: Bạn có chắc chắn muốn HỦY đơn hàng này?')"
                       class="bg-rose-50 text-rose-600 border border-rose-100 px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-[2px] hover:bg-rose-600 hover:text-white transition-all">
                        Hủy đơn hàng
                    </a>
                <?php else: ?>
                    <button disabled class="bg-slate-100 text-slate-300 border border-slate-200 px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-[2px] cursor-not-allowed">
                        Không thể hủy
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>