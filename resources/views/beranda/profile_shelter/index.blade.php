@extends('layouts.beranda')

@section('title', 'Profile Shelter')

@section('content')
<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden" id="profile-container">
    <div class="border-b p-4">
        <h2 class="text-[15px] font-medium uppercase tracking-wider text-gray-700">PROFILE SHELTER</h2>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row items-start gap-8 p-8">
            
            {{-- Shelter Photo (Circle Upload) --}}
            <div class="flex flex-col items-center gap-2">
                <div class="relative group">
                    <label for="foto_input" id="drop-zone" class="relative w-32 h-32 rounded-full overflow-hidden border-2 border-gray-300 flex items-center justify-center text-center bg-gray-50 transition-all opacity-70 cursor-not-allowed">
                        <input type="file" id="foto_input" name="foto" class="hidden" accept="image/*" disabled onchange="previewImage(this)">
                        
                        {{-- Placeholder --}}
                        <div id="placeholder-content" class="px-3">
                            <img src="{{ asset('assets/icons/image-upload.svg') }}" class="w-6 mx-auto opacity-80 mb-2">
                            <p class="text-[10px] text-gray-400">JPG/PNG • Max 5MB</p>
                        </div>

                        {{-- Preview Image --}}
                        <img id="preview-img" src="{{ $shelter['foto'] ? asset($shelter['foto']) : '#' }}" class="{{ $shelter['foto'] ? '' : 'hidden' }} absolute inset-0 w-full h-full object-cover">
                        
                        {{-- Overlay Hover --}}
                        <div id="hover-overlay" class="absolute inset-0 bg-black/40 items-center justify-center hidden">
                            <p class="text-white text-xs font-medium">Ganti foto</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- Form Fields --}}
            <div class="flex-1">
                <div class="grid grid-cols-2 gap-x-8 gap-y-6">
                    @php
                        $fields = [
                            ['id' => 'shleterName', 'label' => 'Nama Shelter', 'value' => $shelter['shleterName']],
                            ['id' => 'ownerName', 'label' => 'Nama Owner', 'value' => $shelter['ownerName']],
                            ['id' => 'noTelephone', 'label' => 'Nomor Telephone', 'value' => $shelter['noTelephone']],
                            ['id' => 'email', 'label' => 'Email', 'value' => $shelter['email']],
                        ];
                    @endphp

                    @foreach($fields as $f)
                    <div class="grid w-full gap-2">
                        <label class="text-sm font-medium text-gray-700">{{ $f['label'] }}</label>
                        <input type="text" name="{{ $f['id'] }}" value="{{ $f['value'] }}" readonly
                               class="profile-input w-full bg-gray-50 text-gray-600 rounded-sm border-gray-300 px-3 py-2 outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all cursor-not-allowed">
                    </div>
                    @endforeach

                    <div class="grid w-full gap-2">
                        <label class="text-sm font-medium">Metode Pembayaran</label>
                        <select name="metodePembayaran" disabled class="profile-input w-full bg-gray-50 text-gray-600 rounded-sm border-gray-300 px-3 py-2 outline-none cursor-not-allowed">
                            <option value="mandiri" {{ $shelter['metodePembayaran'] == 'mandiri' ? 'selected' : '' }}>Mandiri</option>
                            <option value="dana" {{ $shelter['metodePembayaran'] == 'dana' ? 'selected' : '' }}>Dana</option>
                        </select>
                    </div>

                    <div class="h-4"></div> {{-- SizedBox --}}

                    <div class="grid w-full gap-2">
                        <label class="text-sm font-medium">Negara/Daerah</label>
                        <select name="negara" disabled class="profile-input w-full bg-gray-50 text-gray-600 rounded-sm border-gray-300 px-3 py-2 outline-none cursor-not-allowed">
                            <option value="indonesia" selected>Indonesia</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="grid w-full gap-2">
                            <label class="text-sm font-medium">Jalan</label>
                            <select name="jalan" disabled class="profile-input w-full bg-gray-50 text-gray-600 rounded-sm border-gray-300 px-3 py-2 outline-none cursor-not-allowed">
                                <option value="diponegoro" selected>Diponegoro</option>
                            </select>
                        </div>
                        <div class="grid w-full gap-2">
                            <label class="text-sm font-medium">Zip Code</label>
                            <input type="text" name="zipCode" value="{{ $shelter['zipCode'] }}" readonly
                                   class="profile-input w-full bg-gray-50 text-gray-600 rounded-sm border-gray-300 px-3 py-2 outline-none cursor-not-allowed">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex gap-3">
                    <button type="button" id="btn-edit" onclick="toggleEdit(true)" class="h-[40px] px-6 bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-medium rounded-sm transition shadow-sm">
                        Update Shelter
                    </button>
                    
                    <button type="submit" id="btn-save" class="hidden h-[40px] px-8 bg-[#FF8D28] hover:bg-[#FBA81F] text-white font-medium rounded-sm transition shadow-sm">
                        Simpan
                    </button>
                    
                    <button type="button" id="btn-cancel" onclick="toggleEdit(false)" class="hidden h-[40px] px-8 border border-gray-300 text-gray-700 font-medium rounded-sm hover:bg-gray-50 transition">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function toggleEdit(isEditing) {
        const inputs = document.querySelectorAll('.profile-input');
        const photoInput = document.getElementById('foto_input');
        const dropZone = document.getElementById('drop-zone');
        const btnEdit = document.getElementById('btn-edit');
        const btnSave = document.getElementById('btn-save');
        const btnCancel = document.getElementById('btn-cancel');
        const overlay = document.getElementById('hover-overlay');

        inputs.forEach(input => {
            input.readOnly = !isEditing;
            input.disabled = !isEditing;
            if (isEditing) {
                input.classList.remove('bg-gray-50', 'text-gray-600', 'cursor-not-allowed');
                input.classList.add('bg-white', 'text-gray-900', 'cursor-text');
            } else {
                input.classList.add('bg-gray-50', 'text-gray-600', 'cursor-not-allowed');
                input.classList.remove('bg-white', 'text-gray-900', 'cursor-text');
            }
        });

        photoInput.disabled = !isEditing;
        if (isEditing) {
            dropZone.classList.remove('cursor-not-allowed', 'opacity-70');
            dropZone.classList.add('cursor-pointer', 'hover:border-orange-500');
            btnEdit.classList.add('hidden');
            btnSave.classList.remove('hidden');
            btnCancel.classList.remove('hidden');
            overlay.classList.add('group-hover:flex');
        } else {
            dropZone.classList.add('cursor-not-allowed', 'opacity-70');
            dropZone.classList.remove('cursor-pointer', 'hover:border-orange-500');
            btnEdit.classList.remove('hidden');
            btnSave.classList.add('hidden');
            btnCancel.classList.add('hidden');
            overlay.classList.remove('group-hover:flex');
            // Reset image if canceled (logic simplifikasi)
        }
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-img').classList.remove('hidden');
                document.getElementById('placeholder-content').classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection