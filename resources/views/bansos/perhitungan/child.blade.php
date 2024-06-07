@if ($maut->isEmpty())
    <tr>
        <td colspan="5">
            <p class="text-center text-Neutral-40">Data tidak ditemukan!</p>
        </td>
    </tr>
@endif
@foreach ($maut as $item)
    <tr>
        <td class="hidden" id="rt">{{ $item->warga->detailKK->kartuKeluarga->rt }}</td>
        <td>{{ $item->maut_id }}</td>
        <td id="nik">{{ $item->warga->nik }}</td>
        <td id="nama_warga">{{ $item->warga->nama_warga }}</td>
        <td>{{ round($item->skor_akhir, 3) }}</td>
        <td class="flex gap-2 max-w-40">
            <a href="{{ route('detailPerhitungan', $item->maut_id) }}" class="buttonDark">Detail</a>
            <a href="{{ route('createPerhitungan', $item->maut_id) }}" class="buttonLight">+ Tambah</a>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="5" align="left">
        {!! $maut->links('layout.pagination') !!}
    </td>
</tr>