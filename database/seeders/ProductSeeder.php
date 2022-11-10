<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 2,
            'name' => 'ONEX GX3 Premium Quality Gaming Chair Kursi - Hitam',
            'slug' => 'onex-gx3-premium-quality-gaming-chair-kursi-hitam',
            'merk' => 'ONEX',
            'price' => 2349000,
            'stock' => 68,
            'weight' => 31,
            'diskon' => 13,
            'condition' => 'Baru',
            'description' => 'From the living room to the gaming room, plan the next world domination from the comfort of your gaming chair. PVC Faux Leather Fabric
            PVC leather fabric is very similar to PU leather fabric. Instead of polyurethane, PVC leather fabric is made by combining polyvinylchloride with stabilizers (to protect), plasticizers (to soften) and lubricants (to make flexible), and then applying to a base material',
            'gambar' => 'onex.jpeg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Mouse Alcatroz Airmouse V Wireless 1200CPI - Alcatroz Airmouse 5 - MINT',
            'slug' => 'mouse-alcatroz-airmouse-v-wireless 1200cpi-alcatroz-airmouse-5-mint',
            'merk' => 'Alcatroz Airmouse',
            'price' => 35000,
            'stock' => 78,
            'weight' => 0.3,
            'diskon' => 13,
            'condition' => 'Baru',
            'description' => 'Mouse Alcatroz Airmouse V Wireless 1200CPI - Alcatroz Airmouse 5
            Mouse Wireless Alcatroz Airmouse V ini sangat cocok untuk kamu yang bekerja di kantor, sekolah ataupun pemakaian kasual. Karena mouse wireless ini memiliki design yang minimalis dan ergonomis sehingga sangat nyaman di pakai dalam jangka waktu lama sekalipun. Dengan resolusi 1200 CPI, mouse kantor wireless ini mampu mempercepat pekerjaan kamu khususnya untuk kamu yang menggunakan monitor besar.',
            'gambar' => 'mouse.jpg',
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Mi 23.8 Desktop Monitor 1C 75Hz 1080p Full HD - Monitor 24 inch Xiaomi',
            'slug' => 'mi-23.8-desktop-monitor-1c-7hz-1080p-full-hd-monitor-24-inch-xiaomi',
            'merk' => 'MI',
            'price' => 1799000,
            'stock' => 11,
            'weight' => 7,
            'diskon' => 10,
            'condition' => 'Baru',
            'description' => 'Garansi Resmi Xiaomi Indonesia 1 tahun
            Tampilan lebar 178 derajat
            Layar lebar IPS 23,8" menawarkan bidang pandang selebar 178 derajat,
            dengan tampilan jernih dan realistis di setiap sudutnya. Baik untuk pekerjaan atau kehidupan sehari-hari, tampilan yang jelas dan penuh warna seperti yang Anda lihat dengan mata Anda.
            Ringkas dan tipis, canggih, tapi sederhana
            Bagian paling tipis dari bodinya berukuran 7,3 mm, sehingga menghemat ruang permukaan meja dan tampak rapi. Bodi yang tipis dan sederhana membuatnya terkesan menonjol dari segala sudut.
            Warna terang, gambar jernih
            Kualitas definisi tinggi 1920*1080 internal dari layar 23.8 ini menawarkan tampilan yang jernih dan jelas, menyejukkan mata
            dengan detail dan kehalusan mengagumkan.
            Cahaya biru rendah, lebih nyaman di mata
            Mode cahaya biru rendah dapat memfilter cahaya biru gelombang pendek yang merusak mata, dengan mengurangi stres pada mata sehingga Anda dapat bekerja dengan nyaman.',
            'gambar' => 'monitor.jpg',
        ]);
    }
}
