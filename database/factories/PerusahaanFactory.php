<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Perusahaan>
 */
class PerusahaanFactory extends Factory
{
    protected $model = Perusahaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kodeWilayah = DB::table('wilayah')->inRandomOrder()->value('kode');;

        return [
            'kode_wilayah' => $kodeWilayah,
            'nama_usaha' => $this->faker->company,
            'sls' => $this->faker->word,
            'alamat' => $this->faker->address,
            'kode_kbli' => $this->faker->randomElement([
                'A. Pertanian, Kehutanan dan Perikanan',
                'B. Pertambangan dan Penggalian',
                'C. Industri Pengolahan',
                'D. Pengadaan Listrik, Gas, Uap/Air Panas Dan Udara Dingin',
                'E. Treatment Air, Treatment Air Limbah, Treatment dan Pemulihan Material Sampah, dan Aktivitas Remediasi',
                'F. Konstruksi',
                'G. Perdagangan Besar Dan Eceran; Reparasi Dan Perawatan Mobil Dan Sepeda Motor',
                'H. Pengangkutan dan Pergudangan',
                'I. Penyediaan Akomodasi Dan Penyediaan Makan Minum',
                'J. Informasi Dan Komunikasi',
                'K. Aktivitas Keuangan dan Asuransi',
                'L. Real Estat',
                'M. Aktivitas Profesional, Ilmiah Dan Teknis',
                'N. Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan dan Penunjang Usaha Lainnya',
                'O. Administrasi Pemerintahan, Pertahanan Dan Jaminan Sosial Wajib',
                'P. Pendidikan',
                'Q. Aktivitas Kesehatan Manusia Dan Aktivitas Sosial',
                'R. Kesenian, Hiburan Dan Rekreasi',
                'S. Aktivitas Jasa Lainnya',
                'T. Aktivitas Rumah Tangga Sebagai Pemberi Kerja; Aktivitas Yang Menghasilkan Barang Dan Jasa Oleh Rumah Tangga yang Digunakan untuk Memenuhi Kebutuhan Sendiri',
                'U. Aktivitas Badan Internasional Dan Badan Ekstra Internasional Lainnya',
            ]),
            'nama_cp' => $this->faker->name,
            'nomor_cp' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
        ];
    }
}
