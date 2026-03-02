<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Penduduk;
use App\Models\PerangkatDesa;
use App\Models\Galeri;
use App\Models\Dokumen;
use App\Models\Pengaduan;

class PublicController extends Controller
{
    public function index()
    {
        $totalWarga     = Penduduk::count();
        $totalLaki      = Penduduk::where('jenis_kelamin','Laki-laki')->count();
        $totalPerempuan = Penduduk::where('jenis_kelamin','Perempuan')->count();
        $pekerjaanData  = Penduduk::selectRaw('pekerjaan, COUNT(*) as jumlah')
                            ->groupBy('pekerjaan')->orderByDesc('jumlah')->limit(5)->get();
        $beritaTerbaru  = Berita::orderByDesc('tanggal')->limit(3)->get();
        $kades          = PerangkatDesa::where('jabatan','like','%Kepala Desa%')->first();
        return view('public.index', compact(
            'totalWarga','totalLaki','totalPerempuan','pekerjaanData','beritaTerbaru','kades'
        ));
    }

    public function berita()
    {
        $berita = Berita::orderByDesc('tanggal')->paginate(9);
        return view('public.berita', compact('berita'));
    }

    public function detailBerita($id)
    {
        $berita = Berita::findOrFail($id);
        return view('public.detail-berita', compact('berita'));
    }

    public function profil()
    {
        $perangkat = PerangkatDesa::all();
        return view('public.profil', compact('perangkat'));
    }

    public function sejarah() { return view('public.sejarah'); }

    public function galeri()
    {
        $galeri = Galeri::orderByDesc('created_at')->get();
        return view('public.galeri', compact('galeri'));
    }

    public function layanan()
    {
        $dokumen = Dokumen::orderByDesc('created_at')->get();
        return view('public.layanan', compact('dokumen'));
    }

    public function cekNik() { return view('public.cek-nik'); }

    public function prosesNik(Request $request)
    {
        $request->validate(['nik' => 'required|digits:16']);
        $penduduk = Penduduk::where('nik', $request->nik)->first();
        return view('public.cek-nik', compact('penduduk'))->with('sudahCari', true);
    }

    public function pengaduan() { return view('public.pengaduan'); }

    public function simpanPengaduan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik'  => 'required|digits:16',
            'isi'  => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = ['nama'=>$request->nama,'nik'=>$request->nik,'isi'=>$request->isi,'status'=>'Pending'];
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengaduan','public');
        }
        Pengaduan::create($data);
        return back()->with('success','Pengaduan berhasil dikirim!');
    }
}
