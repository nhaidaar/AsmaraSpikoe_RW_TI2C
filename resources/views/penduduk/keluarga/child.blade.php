@if ($keluarga->isEmpty())
    <tr>
        <td colspan="5">
            <p class="text-center text-Neutral-40">Data tidak ditemukan!</p>
        </td>
    </tr>
@endif
@foreach ($keluarga as $item)
    <tr>
        <td class="hidden" id="rt">{{ $item->rt }}</td>
        <td id="no_kk">{{ $item->no_kk }}</td>
        <td id="nama_kepala">
            @php
                $namaKepala = '-';
                foreach ($item->detailKK as $anggota) {
                    if ($anggota->hubungan_id == 1) {
                        $namaKepala = $anggota->anggotaKeluarga->nama_warga;
                        break;
                    }
                }
            @endphp
            {{ $namaKepala }}
        </td>
        <td>
            @php
                $anggotaCount = 0;
                foreach ($item->detailKK as $anggota) {
                    if ($anggota->anggotaKeluarga->status_warga == 'Hidup') {
                        $anggotaCount++;
                    }
                }
            @endphp
            {{ $anggotaCount }}
        </td>
        <td>{{ $item->detailKK->first()->anggotaKeluarga->alamat_domisili }}</td>
        <td class="flex gap-2 max-w-60">
            <a href="{{ route('detailKeluarga', $item->kk_id) }}" class="buttonDark w-full md:w-min">Detail</a>
            <a href="{{ route('editKeluarga', $item->kk_id) }}" class="buttonLight w-full md:w-min">Edit</a>
            <button type="button" class="delete-btn buttonLight flex items-center w-fit" data-id="{{ $item->kk_id }}" data-name="{{ $item->detailKK->first()->anggotaKeluarga->nama_warga }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="none" viewBox="0 0 18 20">
                    <path stroke="#C04949" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M1 4.176h16M7 14.765V8.412m4 6.353V8.412M13 19H5c-1.105 0-2-.948-2-2.118V5.235c0-.584.448-1.059 1-1.059h10c.552 0 1 .475 1 1.06v11.646c0 1.17-.895 2.118-2 2.118ZM7 4.176h4c.552 0 1-.474 1-1.058v-1.06C12 1.475 11.552 1 11 1H7c-.552 0-1 .474-1 1.059v1.059c0 .584.448 1.058 1 1.058Z"/>
                </svg>                                                                          
            </button>
        </td>
    </tr>
@endforeach
<tr>
    <td></td>
</tr>
<tr>
    <td colspan="5">
        {!! $keluarga->links('layout.pagination') !!}
    </td>
</tr>