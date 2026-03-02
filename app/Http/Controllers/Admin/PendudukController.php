<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index() {
        $penduduk = Penduduk::orderByDesc('id')->paginate(15);
        return view('admin.penduduk.index', compact('penduduk'));
    }

    // ✅ TAMBAHKAN METHOD INI
    public function create() {
        return redirect()->route('admin.penduduk.index');
    }

    public function store(Request $request) {
        $request->validate([
            'nik'           => 'required|digits:16|unique:penduduk,nik',
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'rt'            => 'required|string|max:5',
            'rw'            => 'required|string|max:5',
            'pekerjaan'     => 'nullable|string|max:100',
        ]);
        Penduduk::create($request->only(['nik','nama','jenis_kelamin','rt','rw','pekerjaan']));
        return redirect()->route('admin.penduduk.index')->with('success','Data warga berhasil ditambahkan.');
    }

    public function edit($id) {
        $penduduk = Penduduk::findOrFail($id);
        return view('admin.penduduk.edit', compact('penduduk'));
    }

    public function update(Request $request, $id) {
        $penduduk = Penduduk::findOrFail($id);
        $request->validate([
            'nik'           => 'required|digits:16|unique:penduduk,nik,'.$id,
            'nama'          => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'rt'            => 'required|string|max:5',
            'rw'            => 'required|string|max:5',
        ]);
        $penduduk->update($request->only(['nik','nama','jenis_kelamin','rt','rw','pekerjaan']));
        return redirect()->route('admin.penduduk.index')->with('success','Data berhasil diperbarui.');
    }

    public function destroy($id) {
        Penduduk::findOrFail($id)->delete();
        return redirect()->route('admin.penduduk.index')->with('success','Data berhasil dihapus.');
    }
}