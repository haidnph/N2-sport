<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-slate-800 italic">
                Quản lý <span class="text-blue-600">Đơn Hàng</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic italic">Hệ thống N2SPORT - Quản lý vận đơn</p>
        </div>
        
        <div class="flex gap-3">
            <span class="bg-white px-4 py-2 rounded-2xl border border-slate-100 shadow-sm text-[10px] font-black uppercase text-slate-400 flex items-center gap-2">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div> Hệ thống ổn định
            </span>
        </div>
    </div>

    <?php if(isset($_GET['success'])): ?>
        <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-[24px] text-sm font-bold italic flex items-center gap-3 animate-bounce">
            <i class="fa-solid fa-circle-check"></i> Thao tác xử lý đơn hàng thành công!
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-900 text-white uppercase text-[10px] font-black tracking-[2px]">
                <tr>
                    <th class="px-6 py-6 text-center">Mã đơn</th>
                    <th class="px-6 py-6">Khách hàng</th>
                    <th class="px-6 py-6 text-center">Ngày đặt</th>
                    <th class="px-6 py-6 text-center">Tổng tiền</th>
                    <th class="px-6 py-6 text-center">Trạng thái</th>
                    <th class="px-6 py-6 text-center">Thanh toán</th>
                    <th class="px-6 py-6 text-center w-40">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 text-sm">
                <?php foreach ($orders as $o): ?>
                <tr class="hover:bg-slate-50/80 transition-all group">
                    <td class="px-6 py-5 text-center font-black text-blue-600 italic">#<?= $o['order_id'] ?></td>

                    <td class="px-6 py-5">
                        <p class="font-bold text-slate-800 uppercase tracking-tight"><?= htmlspecialchars($o['user_name'] ?? 'Khách vãng lai') ?></p>
                        <p class="text-[10px] text-slate-400 italic">ID: #<?= $o['user_id'] ?? '??' ?></p>
                    </td>

                    <td class="px-6 py-5 text-center text-slate-500 font-medium">
                        <?= date('d/m/Y', strtotime($o['order_date'])) ?>
                    </td>

                    <td class="px-6 py-5 text-center">
                        <span class="font-black text-slate-900 italic text-base"><?= number_format($o['total_price']) ?>₫</span>
                    </td>

                    <td class="px-6 py-5 text-center">
                        <?php
                            $statusLabel = match($o['status']) {
                                'pending' => 'Chờ xử lý',
                                'shipping' => 'Đang giao',
                                'done' => 'Hoàn tất',
                                'cancel' => 'Đã hủy',
                                default => 'Không xác định'
                            };
                            $statusColor = match($o['status']) {
                                'pending' => 'bg-amber-100 text-amber-600',
                                'shipping' => 'bg-blue-100 text-blue-600',
                                'done' => 'bg-emerald-100 text-emerald-600',
                                'cancel' => 'bg-slate-200 text-slate-500',
                                default => 'bg-gray-100'
                            };
                        ?>
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase italic tracking-wider <?= $statusColor ?>">
                            <?= $statusLabel ?>
                        </span>
                    </td>

                    <td class="px-6 py-5 text-center">
                        <?php if($o['payment_status'] === 'paid'): ?>
                            <span class="text-emerald-500 font-black text-[10px] uppercase tracking-tighter">
                                <i class="fa-solid fa-circle-check mr-1"></i> Đã trả tiền
                            </span>
                        <?php else: ?>
                            <span class="text-rose-500 font-black text-[10px] uppercase tracking-tighter">
                                <i class="fa-solid fa-clock-rotate-left mr-1"></i> Còn nợ
                            </span>
                        <?php endif; ?>
                    </td>

                    <td class="px-6 py-5 text-center">
                        <div class="flex justify-center gap-3">
                            <a href="index.php?url=admin-order-detail&id=<?= $o['order_id'] ?>" 
                               class="w-10 h-10 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                               title="Xem chi tiết đơn hàng">
                                <i class="fa-solid fa-eye text-xs"></i>
                            </a>
                            
                            <a href="index.php?url=admin-order-delete&id=<?= $o['order_id'] ?>" 
                               onclick="return confirm('⚠️ CẢNH BÁO N2SPORT: Bạn có chắc chắn muốn XÓA VĨNH VIỄN đơn hàng #<?= $o['order_id'] ?> khỏi hệ thống?')"
                               class="w-10 h-10 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center hover:bg-rose-500 hover:text-white transition-all shadow-sm shadow-rose-100"
                               title="Xóa đơn hàng">
                                <i class="fa-solid fa-trash-can text-xs"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-12 opacity-[0.03] select-none pointer-events-none hidden lg:block">
        <h2 class="text-9xl font-black italic uppercase tracking-tighter text-slate-900">N2SPORT ORDERS</h2>
    </div>
</div>