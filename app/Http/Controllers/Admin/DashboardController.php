<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\Berita;
use App\Models\Pengaduan;
use App\Models\PerangkatDesa;
use App\Models\Dokumen;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalPenduduk'    => Penduduk::count(),
            'totalLaki'        => Penduduk::where('jenis_kelamin','Laki-laki')->count(),
            'totalPerempuan'   => Penduduk::where('jenis_kelamin','Perempuan')->count(),
            'totalBerita'      => Berita::count(),
            'totalPengaduan'   => Pengaduan::count(),
            'pengaduanPending' => Pengaduan::where('status','Pending')->count(),
            'totalPerangkat'   => PerangkatDesa::count(),
            'totalDokumen'     => Dokumen::count(),
            'totalGaleri'      => Galeri::count(),
        ];
        $pekerjaanData    = Penduduk::selectRaw('pekerjaan, COUNT(*) as jumlah')
                              ->groupBy('pekerjaan')->orderByDesc('jumlah')->limit(5)->get();
        $pengaduanTerbaru = Pengaduan::orderByDesc('created_at')->limit(5)->get();
        return view('admin.dashboard', compact('stats','pekerjaanData','pengaduanTerbaru'));
    }
}
