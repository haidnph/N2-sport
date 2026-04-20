<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-10 flex flex-col md:flex-row justify-between items-end gap-6">
        <div>
            <h1 class="text-4xl font-black uppercase tracking-tighter text-slate-800 italic">
                N2SPORT <span class="text-blue-600">Analytics</span>
            </h1>
            <p class="text-slate-500 text-sm mt-1 font-medium italic">Báo cáo hiệu suất kinh doanh thời gian thực</p>
        </div>

        <div class="bg-white p-4 rounded-[28px] shadow-sm border border-slate-100">
            <form action="index.php" method="GET" class="flex items-center gap-4">
                <input type="hidden" name="url" value="admin-stats">
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black uppercase text-slate-400">Từ</span>
                    <input type="date" name="start_date" value="<?= $startDate ?>" 
                           class="bg-slate-50 border-none rounded-xl px-3 py-2 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-600">
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[10px] font-black uppercase text-slate-400">Đến</span>
                    <input type="date" name="end_date" value="<?= $endDate ?>" 
                           class="bg-slate-50 border-none rounded-xl px-3 py-2 text-xs font-bold outline-none focus:ring-2 focus:ring-blue-600">
                </div>
                <button type="submit" class="bg-slate-900 text-white p-2.5 rounded-xl hover:bg-blue-600 transition-all shadow-lg shadow-blue-200">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="bg-slate-900 p-8 rounded-[40px] shadow-xl relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[3px] text-blue-400 mb-2 italic">Tổng doanh thu</p>
                <h3 class="text-4xl font-black text-white italic tracking-tighter"><?= number_format($totalRevenue) ?> <span class="text-lg font-medium">đ</span></h3>
                <div class="mt-4 flex items-center gap-2 text-emerald-400 text-xs font-bold">
                </div>
            </div>
            <i class="fa-solid fa-money-bill-wave absolute -bottom-4 -right-4 text-8xl text-white/5 -rotate-12 group-hover:scale-110 transition-transform"></i>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[3px] text-slate-400 mb-2 italic">Đơn hàng hoàn tất</p>
                <h3 class="text-4xl font-black text-slate-800 italic tracking-tighter"><?= number_format($orderCount) ?> <span class="text-lg font-medium text-slate-400">đơn</span></h3>
                <div class="mt-4 flex items-center gap-2 text-blue-600 text-xs font-bold">
                    <i class="fa-solid fa-box"></i>
                    <span>Vận hành ổn định</span>
                </div>
            </div>
            <i class="fa-solid fa-cart-shopping absolute -bottom-4 -right-4 text-8xl text-slate-50 -rotate-12 group-hover:scale-110 transition-transform"></i>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[3px] text-slate-400 mb-2 italic">Mặt hàng đang bán</p>
                <h3 class="text-4xl font-black text-slate-800 italic tracking-tighter"><?= number_format($productCount) ?> <span class="text-lg font-medium text-slate-400">sản phẩm</span></h3>
                <div class="mt-4 flex items-center gap-2 text-purple-600 text-xs font-bold">
                    <i class="fa-solid fa-bolt"></i>
                    <span>Tiếp tục cập nhật</span>
                </div>
            </div>
            <i class="fa-solid fa-shoe-prints absolute -bottom-4 -right-4 text-8xl text-slate-50 -rotate-12 group-hover:scale-110 transition-transform"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-[40px] shadow-xl border border-slate-100">
            <div class="mb-8">
                <h3 class="text-xl font-black uppercase italic tracking-tight text-slate-800">Doanh thu <span class="text-blue-600">7 ngày gần nhất</span></h3>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Hiệu suất bán hàng theo tuần</p>
            </div>
            <canvas id="revenueChart" height="200"></canvas>
        </div>

        <div class="bg-white p-8 rounded-[40px] shadow-xl border border-slate-100">
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-black uppercase italic tracking-tight text-slate-800">Top 5 <span class="text-blue-600">Siêu Phẩm</span></h3>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Sản phẩm được săn đón nhất</p>
                </div>
                <i class="fa-solid fa-fire text-orange-500 text-2xl animate-pulse"></i>
            </div>
            
            <div class="space-y-6">
                <?php if(!empty($topProducts)): ?>
                    <?php foreach($topProducts as $p): ?>
                    <div class="flex items-center justify-between group">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl overflow-hidden shadow-sm">
                                <img src="uploads/<?= $p['image'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition">
                            </div>
                            <div>
                                <p class="font-black text-slate-800 uppercase italic text-sm tracking-tight"><?= $p['product_name'] ?></p>
                                <p class="text-[10px] font-bold text-blue-600 italic leading-none mt-1"><?= $p['total_qty'] ?> đôi đã bán</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-black text-slate-900 italic"><?= number_format($p['total_revenue']) ?> đ</p>
                            <div class="w-24 h-1 bg-slate-100 rounded-full mt-2 overflow-hidden">
                                <div class="bg-blue-600 h-full rounded-full" style="width: <?= ($p['total_qty'] / $topProducts[0]['total_qty']) * 100 ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center py-10 text-slate-400 italic">Dữ liệu trống...</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('revenueChart').getContext('2d');

// Dùng mảng ngày trong tuần (labels) và doanh thu tương ứng (data)
// Ví dụ: $labels = ['T.2', 'T.3', 'T.4', ...], $revenues = [1200000, 5000000, ...]
new Chart(ctx, {
    type: 'bar', // Chuyển sang cột (bar) để xem theo tuần trực quan hơn
    data: {
        labels: <?= json_encode($days ?? ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']) ?>,
        datasets: [{
            label: 'Doanh thu (đ)',
            data: <?= json_encode($weeklyRevenues ?? [0,0,0,0,0,0,0]) ?>,
            backgroundColor: '#3b82f6',
            borderRadius: 12,
            hoverBackgroundColor: '#1e1b4b',
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { 
                beginAtZero: true,
                grid: { display: false },
                ticks: { font: { weight: 'bold', family: 'Inter' } }
            },
            x: { 
                grid: { display: false },
                ticks: { font: { weight: 'bold', family: 'Inter' } }
            }
        }
    }
});
</script>