<div class="max-w-4xl mx-auto p-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Upload Modul Besar (sampai 100MB)</h2>

        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-bold">Berhasil!</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-bold">Terjadi Kesalahan</p>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded mb-4 flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <p class="font-bold">Perhatian</p>
                    <p>{{ session('warning') }}</p>
                </div>
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Modul</label>
                    <input type="text" id="title" wire:model="title" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" 
                           required>
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select id="level" wire:model="level" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('level') border-red-500 @enderror" 
                            required>
                        <option value="">Pilih Level</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                    @error('level') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea id="description" wire:model="description" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" 
                          required></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Mata Pelajaran</label>
                    <select id="subject" wire:model="subject" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subject') border-red-500 @enderror" 
                            required>
                        <option value="">Pilih Mata Pelajaran</option>
                        <option value="Matematika">Matematika</option>
                        <option value="IPA">IPA</option>
                        <option value="B. Indonesia">B. Indonesia</option>
                        <option value="IPS">IPS</option>
                        <option value="B. Inggris">B. Inggris</option>
                        <option value="Fisika">Fisika</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Biologi">Biologi</option>
                    </select>
                    @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <select id="icon" wire:model="icon" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('icon') border-red-500 @enderror" 
                            required>
                        <option value="">Pilih Icon</option>
                        <option value="fas fa-calculator">🧮 Calculator (Matematika)</option>
                        <option value="fas fa-flask">🧪 Flask (IPA/Kimia)</option>
                        <option value="fas fa-atom">⚛️ Atom (Fisika)</option>
                        <option value="fas fa-book-open-reader">📖 Book Reader (B. Indonesia)</option>
                        <option value="fas fa-language">🌐 Language (B. Inggris)</option>
                        <option value="fas fa-square-root-variable">√ Square Root (Matematika)</option>
                        <option value="fas fa-globe">🌍 Globe (IPS)</option>
                        <option value="fas fa-dna">🧬 DNA (Biologi)</option>
                        <option value="fas fa-book">📚 Book (Umum)</option>
                    </select>
                    @error('icon') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">File Modul</label>
                <div class="flex items-center justify-center w-full">
                    <label for="file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 @error('file') border-red-500 @enderror">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-1 text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> atau drag and drop</p>
                            <p class="text-xs text-gray-500">PDF, DOC, DOCX, PPT, PPTX (Maksimal 100MB)</p>
                        </div>
                        <input type="file" id="file" wire:model="file" accept=".pdf,.doc,.docx,.ppt,.pptx" class="hidden" />
                    </label>
                </div>
                @error('file') 
                    <div class="mt-2 flex items-center text-red-500 text-sm">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
                
                @if ($file)
                    <div class="mt-4 p-3 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center">
                            <div class="mr-3">
                                @if(in_array(strtolower($file->getClientOriginalExtension()), ['pdf']))
                                    <svg class="w-10 h-10 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                @elseif(in_array(strtolower($file->getClientOriginalExtension()), ['doc', 'docx']))
                                    <svg class="w-10 h-10 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                @elseif(in_array(strtolower($file->getClientOriginalExtension()), ['ppt', 'pptx']))
                                    <svg class="w-10 h-10 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                @else
                                    <svg class="w-10 h-10 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-medium text-blue-700">{{ $file->getClientOriginalName() }}</p>
                                <p class="text-xs text-blue-600">{{ round($file->getSize() / 1024 / 1024, 2) }} MB • {{ strtoupper($file->getClientOriginalExtension()) }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" wire:model="is_active" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Aktifkan modul
                    </label>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('filament.admin.resources.modules.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-300">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300 disabled:opacity-50"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove>Simpan Modul</span>
                    <span wire:loading>Mengupload...</span>
                </button>
            </div>

            <div wire:loading wire:target="save" class="mt-4">
                <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                    <div class="flex items-center">
                        <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-blue-600 mr-3"></div>
                        <div>
                            <span class="text-blue-700 font-medium">Sedang mengupload file...</span>
                            <p class="text-blue-600 text-sm mt-1">Mohon jangan tutup halaman ini. Proses upload file besar bisa memakan waktu beberapa menit tergantung ukuran file dan kecepatan internet Anda.</p>
                        </div>
                    </div>
                    <div class="mt-3 h-2 w-full bg-blue-200 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-600 rounded-full animate-pulse" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>