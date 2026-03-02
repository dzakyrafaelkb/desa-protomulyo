@extends('layouts.app')
@section('content')
<div class="container-fluid px-4 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Profil Desa Protomulyo</h2>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>
    <div class="row g-4 mb-5 justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 border-top border-success border-4">
                <h5 class="fw-bold text-success mb-3"><i class="bi bi-eye me-2"></i>Visi</h5>
                <p class="text-muted">"Terwujudnya Desa Protomulyo yang Maju, Mandiri, Sejahtera, dan Berbudaya berbasis Teknologi Informasi."</p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 border-top border-primary border-4">
                <h5 class="fw-bold text-primary mb-3"><i class="bi bi-bullseye me-2"></i>Misi</h5>
                <ul class="text-muted ps-3">
                    <li class="mb-2">Meningkatkan kualitas pelayanan publik yang transparan.</li>
                    <li class="mb-2">Mengembangkan potensi ekonomi dan sumber daya manusia.</li>
                    <li class="mb-2">Menjaga kelestarian budaya dan kearifan lokal.</li>
                    <li>Memanfaatkan teknologi informasi untuk kemajuan desa.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-center mb-5">
        <h3 class="fw-bold">Struktur Organisasi Perangkat Desa</h3>
        <hr class="mx-auto" style="width:60px;height:3px;background:#10B981;">
    </div>

    @php
        $level1 = $perangkat->filter(fn($p) => stripos($p->jabatan, 'kepala desa') !== false && stripos($p->jabatan, 'wakil') === false);
        $level2 = $perangkat->filter(fn($p) => stripos($p->jabatan, 'wakil') !== false);
        $level3 = $perangkat->filter(fn($p) => stripos($p->jabatan, 'sekretaris') !== false);
        $level4 = $perangkat->filter(fn($p) => stripos($p->jabatan, 'bendahara') !== false);
        $levelLain = $perangkat->filter(fn($p) =>
            stripos($p->jabatan, 'kepala desa') === false &&
            stripos($p->jabatan, 'wakil') === false &&
            stripos($p->jabatan, 'sekretaris') === false &&
            stripos($p->jabatan, 'bendahara') === false
        );
    @endphp

    <style>
        .org-wrap { display:flex; flex-direction:column; align-items:center; }
        .org-row  { display:flex; justify-content:center; align-items:flex-start; gap:32px; flex-wrap:wrap; }
        .org-col  { display:flex; flex-direction:column; align-items:center; }

        .org-card {
            background:#fff;
            border-radius:20px;
            box-shadow:0 6px 24px rgba(0,0,0,0.09);
            padding:28px 24px 20px;
            text-align:center;
            transition:transform .2s, box-shadow .2s;
            border-top:5px solid #10B981;
            width:200px;
        }
        .org-card:hover { transform:translateY(-6px); box-shadow:0 12px 36px rgba(16,185,129,0.18); }
        .org-card .foto-wrap {
            width:110px; height:110px;
            border-radius:50%;
            overflow:hidden;
            border:4px solid #10B981;
            margin:0 auto 14px;
            background:#10B981;
            display:flex; align-items:center; justify-content:center;
        }
        .org-card .foto-wrap img { width:100%; height:100%; object-fit:cover; }
        .org-card h6 { font-size:15px; font-weight:700; margin-bottom:5px; color:#1f2937; }
        .org-card small { font-size:12px; font-weight:600; text-transform:uppercase; letter-spacing:.6px; }

        /* kepala - hijau */
        .card-l1 { border-top-color:#10B981; }
        .card-l1 .foto-wrap { border-color:#10B981; }
        .card-l1 small { color:#10B981; }

        /* wakil - biru */
        .card-l2 { border-top-color:#3B82F6; }
        .card-l2 .foto-wrap { border-color:#3B82F6; background:#3B82F6; }
        .card-l2 small { color:#3B82F6; }

        /* sekretaris - ungu */
        .card-l3 { border-top-color:#8B5CF6; }
        .card-l3 .foto-wrap { border-color:#8B5CF6; background:#8B5CF6; }
        .card-l3 small { color:#8B5CF6; }

        /* bendahara - kuning */
        .card-l4 { border-top-color:#F59E0B; }
        .card-l4 .foto-wrap { border-color:#F59E0B; background:#F59E0B; }
        .card-l4 small { color:#F59E0B; }

        /* anggota - abu */
        .card-l5 { border-top-color:#6B7280; }
        .card-l5 .foto-wrap { border-color:#6B7280; background:#6B7280; }
        .card-l5 small { color:#6B7280; }

        .line-v { width:3px; height:40px; background:#10B981; margin:0 auto; }
        .anggota-label {
            background:#6B7280; color:#fff;
            padding:6px 20px; border-radius:30px;
            font-size:13px; font-weight:600;
            margin-bottom:20px;
        }
    </style>

    <div class="org-wrap">

        {{-- Level 1: Kepala Desa --}}
        @if($level1->count())
        <div class="org-row">
            @foreach($level1 as $p)
            <div class="org-col">
                <div class="org-card card-l1">
                    <div class="foto-wrap">
                        @if($p->foto)
                            <img src="{{ $1->foto }}" alt="{{ $p->nama }}">
                        @else
                            <i class="bi bi-person-fill text-white" style="font-size:48px;"></i>
                        @endif
                    </div>
                    <h6>{{ $p->nama }}</h6>
                    <small>{{ $p->jabatan }}</small>
                </div>
            </div>
            @endforeach
        </div>
        <div class="line-v"></div>
        @endif

        {{-- Level 2: Wakil --}}
        @if($level2->count())
        <div class="org-row">
            @foreach($level2 as $p)
            <div class="org-col">
                <div class="org-card card-l2">
                    <div class="foto-wrap">
                        @if($p->foto)
                            <img src="{{ $1->foto }}" alt="{{ $p->nama }}">
                        @else
                            <i class="bi bi-person-fill text-white" style="font-size:48px;"></i>
                        @endif
                    </div>
                    <h6>{{ $p->nama }}</h6>
                    <small>{{ $p->jabatan }}</small>
                </div>
            </div>
            @endforeach
        </div>
        <div class="line-v"></div>
        @endif

        {{-- Level 3: Sekretaris + Bendahara sejajar --}}
        @if($level3->count() || $level4->count())
        <div class="org-row">
            @foreach($level3 as $p)
            <div class="org-col">
                <div class="org-card card-l3">
                    <div class="foto-wrap">
                        @if($p->foto)
                            <img src="{{ $1->foto }}" alt="{{ $p->nama }}">
                        @else
                            <i class="bi bi-person-fill text-white" style="font-size:48px;"></i>
                        @endif
                    </div>
                    <h6>{{ $p->nama }}</h6>
                    <small>{{ $p->jabatan }}</small>
                </div>
            </div>
            @endforeach
            @foreach($level4 as $p)
            <div class="org-col">
                <div class="org-card card-l4">
                    <div class="foto-wrap">
                        @if($p->foto)
                            <img src="{{ $1->foto }}" alt="{{ $p->nama }}">
                        @else
                            <i class="bi bi-person-fill text-white" style="font-size:48px;"></i>
                        @endif
                    </div>
                    <h6>{{ $p->nama }}</h6>
                    <small>{{ $p->jabatan }}</small>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Level 4: Anggota/Staf lainnya --}}
        @if($levelLain->count())
        <div class="line-v"></div>
        <div class="anggota-label">Staf & Anggota</div>
        <div class="org-row">
            @foreach($levelLain as $p)
            <div class="org-col">
                <div class="org-card card-l5">
                    <div class="foto-wrap">
                        @if($p->foto)
                            <img src="{{ $1->foto }}" alt="{{ $p->nama }}">
                        @else
                            <i class="bi bi-person-fill text-white" style="font-size:48px;"></i>
                        @endif
                    </div>
                    <h6>{{ $p->nama }}</h6>
                    <small>{{ $p->jabatan }}</small>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        @if($perangkat->isEmpty())
        <div class="text-center text-muted py-5">Data perangkat belum tersedia.</div>
        @endif

    </div>
</div>
@endsection

