@php
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp

@if ($keuangan->isEmpty())
    <tr>
        <td colspan="5">
            <p class="text-center text-Neutral-40">Data tidak ditemukan!</p>
        </td>
    </tr>
@endif
@foreach ($keuangan as $item)
    <tr>
        <td>{{ Carbon::parse($item->tanggal)->translatedFormat('j F Y') }}</td>
        <td>{{ $item->jenis_keuangan }}</td>
        <td>Rp {{ $item->nominal }}</td>
        <td>{{ $item->keterangan_keuangan }}</td>
    </tr>
@endforeach
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="5" align="left">
        {!! $keuangan->links('layout.pagination') !!}
    </td>
</tr>
