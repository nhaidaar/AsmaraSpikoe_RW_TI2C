@php
use Carbon\Carbon;
Carbon::setLocale('id');
@endphp

@if ($surat->isEmpty())
    <tr>
        <td colspan="5">
            <p class="text-center text-Neutral-40">Data tidak ditemukan!</p>
        </td>
    </tr>
@endif
@foreach ($surat as $item)  
    <tr>
        <td class="hidden" id="rt">{{ $item->pengajuSurat->detailKK->kartuKeluarga->rt }}</td>
        <td>{{ Carbon::parse($item->surat_tanggal)->translatedFormat('j F Y') }}</td>
        <td id="nama">{{ $item->pengajuSurat->nama_warga }}</td>
        <td>{{ $item->surat_jenis }}</td>
        <td>{{ $item->surat_tujuan }}</td>
        <td class="flex gap-2 max-w-20">
            <a href="{{ url('surat/' . '[' . Carbon::parse($item->surat_tanggal)->translatedFormat('j F Y') . '] - ' . $item->pengajuSurat->nama_warga . '_'  . substr($item->surat_id, -5) . '.docx') }}" class="bg-Primary-Base text-Neutral-0 font-medium px-4 py-2.5 gap-1 rounded-lg">Unduh</a>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="5" align="left">
        {!! $surat->links('layout.pagination') !!}
    </td>
</tr>