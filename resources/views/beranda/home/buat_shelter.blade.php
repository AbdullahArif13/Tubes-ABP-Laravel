@extends('layouts.beranda')

@section('title', 'Buat Shelter')

@section('content')
<div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm">
    <div class="border-b p-4">
        <h2 class="text-sm font-medium uppercase tracking-wider text-gray-700">BUAT SHELTER</h2>
    </div>

    <form action="{{ route('buat_shelter.post') }}" method="POST" enctype="multipart/form-data" class="p-8">
        @csrf
        <div class="flex flex-row items-start gap-12">
            
            {{-- Shelter Photo (Circle Upload) --}}
            <div class="flex flex-col items-center gap-4">
                <div class="relative group">
                    <label for="foto_shelter" class="w-32 h-32 rounded-full overflow-hidden border-2 border-gray-300 flex flex-col items-center justify-center bg-gray-50 cursor-pointer hover:border-orange-500 transition relative">
                        <input type="file" id="foto_shelter" name="foto_shelter" class="hidden" accept="image/*" onchange="previewImage(this)">
                        
                        <div id="upload-placeholder" class="text-center p-3">
                            <img src="{{ asset('assets/icons/image-upload.svg') }}" class="w-6 mx-auto opacity-50 mb-1">
                            <p class="text-[10px] text-gray-500">Upload foto</p>
                        </div>
                        
                        <img id="image-preview" class="hidden absolute inset-0 w-full h-full object-cover">
                    </label>
                </div>
                <p class="text-[10px] text-gray-400">JPG/PNG • Max 5MB</p>
            </div>

            {{-- Input Grid --}}
            <div class="flex-1">
                <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                    {{-- Fields --}}
                    @foreach(['shelterName' => 'Nama Shelter', 'ownerName' => 'Nama Owner', 'noTelephone' => 'Nomor Telephone', 'email' => 'Email'] as $name => $label)
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium text-gray-700">{{ $label }}</label>
                        <input type="text" name="{{ $name }}" class="border border-gray-300 rounded-sm px-3 py-2 outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition">
                    </div>
                    @endforeach

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium">Metode Pembayaran</label>
                        <select name="metodePembayaran" class="border border-gray-300 rounded-sm px-3 py-2 outline-none focus:border-orange-500">
                            <option value="mandiri">Mandiri</option>
                            <option value="dana">Dana</option>
                        </select>
                    </div>

                    <div></div> {{-- Spacer --}}

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium text-gray-700">Negara/Daerah</label>
                        <select name="negara" class="border border-gray-300 rounded-sm px-3 py-2 outline-none">
                            <option value="indonesia">Indonesia</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-gray-700">Jalan</label>
                            <select name="jalan" class="border border-gray-300 rounded-sm px-3 py-2 outline-none">
                                <option value="bojongsoang">Bojongsoang</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-2 text-gray-900">
                            <label class="text-sm font-medium">Zip Code</label>
                            <input type="text" name="zipCode" class="border border-gray-300 rounded-sm px-3 py-2 outline-none">
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <button type="submit" class="w-1/4 h-[40px] bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-medium rounded-sm transition">
                        Buat Shelter
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
                document.getElementById('upload-placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection