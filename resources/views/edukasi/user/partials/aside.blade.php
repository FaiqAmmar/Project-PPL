<div class="bg-[#D6E8EE] rounded py-3 pl-4 flex flex-col">


    {{-- @dd($firstMateris) --}}
    @if ($firstMateris != null)
        @foreach ($firstMateris as $item)
            <div class="flex flex-row gap-x-4">
                <span class="text-xl font-semibold">{{ $item->judul_materi }} </span>
                {{-- <span class="text-xl font-semibold">{{ $item->id }} </span> --}}                           
            </div>
            
            @foreach ($item->subMateri as $item)
                <ul class="text-base mb-2">
                    <li class="underline"><a
                            href="/user/edukasi/{{ $first->id }}/{{ $item->id }}">{{ $item->judul }} </a></li>
                </ul>
            @endforeach
        @endforeach
    @endif
</div>

<script>
    document.querySelectorAll('[data-modal-toggle]').forEach(item => {
        item.addEventListener('click', event => {
            const itemId = event.currentTarget.dataset.itemId;
            const modalTarget = document.querySelector(`#${event.currentTarget.dataset.modalTarget}`);

            // Update nilai input tersembunyi dengan nilai ID
            modalTarget.querySelector('#itemIdInput').value = itemId;

            // Tampilkan modal
            modalTarget.classList.add('show');
        });
    });
</script>