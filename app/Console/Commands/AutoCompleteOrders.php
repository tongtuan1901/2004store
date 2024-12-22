<?php

namespace App\Console\Commands;

use App\Models\AdminOrder;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoCompleteOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-complete-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Xác nhận';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = AdminOrder::where('status', 'Đã giao hàng')
                            ->whereNull('completed_time')
                            ->where('delivered_time', '<=', Carbon::now()->subDays(1))
                            ->update([
                                'status' => 'Hoàn thành',
                                'completed_time' => Carbon::now(),
                            ]);

        $this->info("Đơn hàng ID {$orders->id} đã được chuyển trạng thái thành Hoàn thành.");
    }
}

