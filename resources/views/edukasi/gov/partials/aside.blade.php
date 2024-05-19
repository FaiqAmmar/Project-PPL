<div class="bg-[#D6E8EE] rounded py-3 pl-4 flex flex-col">
    <button id="buttonMateriModal" type="submit" data-modal-target="tambahMateriModal"
        data-modal-toggle="tambahMateriModal"
        class="mr-3 mb-3 flex h-8 w-8 p-1 bg-[#365486] group-hover:bg-[#304b78] rounded-full items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512">
            <path fill="white"
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg>
    </button>
    <div id="tambahMateriModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Materi Edukasi
                    </h3>
                    <button data-modal-toggle="tambahMateriModal" type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" method="post" action="{{ route('gov.edukasi.materi.store') }}">
                        @csrf
                        @method('post')
                        <div>
                            <label for="judulEdu"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Materi
                                Edukasi</label>
                            <input type="text" name="judul_materi" id="judul_materi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required />
                            <input type="hidden" name="jenis_id" id="jenis_id" value="{{ $first->id }}" />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @dd($firstMateris) --}}
    @if ($firstMateris != null)
        @foreach ($firstMateris as $item)
            <div class="flex flex-row gap-x-4">
                <span class="text-xl font-semibold">{{ $item->judul_materi }} </span>
                {{-- <span class="text-xl font-semibold">{{ $item->id }} </span> --}}
                <div class="group flex items-center">
                    <button
                        class="mt-2 flex h-4 w-4 p-1 bg-[#365486] group-hover:bg-[#304b78] rounded-full items-center justify-center"
                        data-modal-target="tambahSubModal" data-item-id="{{$item->id}}"
                        data-modal-toggle="tambahSubModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 448 512">
                            <path fill="white"
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32v144H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h144v144c0 17.7 14.3 32 32 32s32-14.3 32-32V288h144c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                    </button>
                    {{-- <button class="ml-2" data-item-id="{{$item->id}}" data-modal-toggle="editMateri" data-modal-target="editMateri">
                        <img class="h-3 w-3" src="{{ url('tombol-edit.png') }}" alt="tombol-edit">
                    </button> --}}
                </div>
                {{-- <div id="editMateri" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Edit Materi Edukasi
                                </h3>
                                <button data-modal-toggle="editMateri" type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="space-y-4" method="post"
                                    action="{{route('admin.materi.edit',[$first->id])}}">
                                    @method('put')
                                    @csrf                                    
                                    <div>
                                        <label for="judulEdu"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                            Materi
                                            Edukasi</label>
                                            
                                            <input type="text" name="materi_id" id="itemIdInput" value="{{ $first->id }}" />
                                        <input type="text" value="{{old('judul_materi', $item->judul_materi)}}" name="judul_materi" id="judul_materi"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required />
                                        
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            
            @foreach ($item->subMateri as $item)
                <ul class="text-base mb-2">
                    <li class="underline"><a
                            href="/gov/edukasi/{{ $first->id }}/{{ $item->id }}">{{ $item->judul }} </a></li>
                </ul>
            @endforeach

            <div id="tambahSubModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Tambah Sub Materi Edukasi
                            </h3>
                            <button data-modal-toggle="tambahSubModal" type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" enctype="multipart/form-data" method="post"
                                action="{{ route('gov.edukasi.sub') }}">
                                @csrf
                                @method('post')
                                <div>
                                    <label for="judulEdu"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Sub
                                        Materi Edukasi <span class="text-red-500">*</span></label>
                                    <input type="text" name="judul" id="judul"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required />
                                    <input type="hidden" name="materi_id" id="itemIdInput"
                                        value="{{ $first->id }}" />
                                    <label for="judulEdu"
                                        class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                                        Sub
                                        Materi Edukasi <span class="text-red-500">*</span></label>
                                    <textarea name="body" id="body"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required></textarea>
                                    <label for="video"
                                        class="block mt-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Video</label>
                                    <input type="file" name="video" id="video"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        accept="video/*">


                                </div>
                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Accept?</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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