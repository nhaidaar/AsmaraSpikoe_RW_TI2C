@foreach ($maut as $item)
    <tr>
        <td class="hidden" id="rt">{{ $item->warga->detailKK->kartuKeluarga->rt }}</td>
        <td>
            <label for="rank-1" class="flex items-center gap-3">
                <input id="rank-1" type="checkbox" class="appearance-none w-6 h-6 bg-white checked:bg-Primary-Base border-transparent checked:border-transparent">
                <svg class="w-6 h-6 text-white absolute" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>{{ $item->maut_id }}</span>
            </label>
        </td>
        <td id="nik">{{ $item->warga->nik }}</td>
        <td id="nama_warga">{{ $item->warga->nama_warga }}</td>
        <td>{{ $item->skor_akhir }}</td>
        <td class="flex gap-2 max-w-20">
            <a href="{{ route('detailPerhitungan', $item->maut_id) }}" class="buttonDark">Detail</a>
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