@if ($warga->isEmpty())
    <tr>
        <td colspan="5">
            <p class="text-center text-Neutral-40">Data tidak ditemukan!</p>
        </td>
    </tr>
@endif
@foreach ($warga as $item)
    <tr>
        <td class="hidden" id="rt">{{ $item->warga->detailKK->kartuKeluarga->rt }}</td>
        <td id="nik">{{ $item->warga->nik }}</td>
        <td id="nama_warga">{{ $item->warga->nama_warga }}</td>
        <td>{{ $item->warga->alamat_domisili }}</td>
        <td>{{ $item->bansos->bansos_nama }}</td>
    </tr>
@endforeach
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="5" align="left">
        {!! $warga->links('layout.pagination') !!}
    </td>
</tr>