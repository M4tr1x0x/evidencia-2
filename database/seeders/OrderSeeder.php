<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder {
    public function run() {
        Order::create([
            'invoice_number' => 'INV-001',
            'status' => 'in_process',
            'user_id' => 1
        ]);

        Order::create([
            'invoice_number' => 'INV-002',
            'status' => 'delivered',
            'user_id' => 2,
            'evidence_photo' => 'photo1.jpg'
        ]);
    }
}
