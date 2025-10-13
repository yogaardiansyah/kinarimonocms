<x-filament-panels::page>
    <div
        x-data="posterGenerator(@js($initialData))"
        x-init="init()"
        @filament-notifications:sent.window="isLoading = false"
        class="font-sans"
    >
        <div class="flex justify-end mb-4">
            <x-filament::button
                @click="saveToServer"
                x-bind:disabled="isLoading"
                icon="heroicon-o-arrow-down-tray"
            >
                <span x-show="!isLoading">Simpan ke Sistem</span>
                <span x-show="isLoading">Menyimpan...</span>
            </x-filament::button>
        </div>

        <div class="flex flex-col md:flex-row gap-8 max-w-7xl mx-auto">
            <!-- Kolom Kiri (Panel Kontrol) -->
            <div class="w-full md:w-1/3 flex flex-col gap-6">
                <div>
                    {{-- PERBAIKAN DI SINI: Menggunakan $wire.headerTitle --}}
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-gray-200" x-text="$wire.headerTitle"></h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Buat poster kustom Anda dengan mudah.</p>
                </div>
                <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">1. Unggah Gambar</h3>
                    <input type="file" accept="image/*" @change="handleImageUpload($event)" class="block w-full text-sm text-gray-500 mt-4 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
                <div x-show="userImageSrc" x-cloak class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">2. Atur Gambar</h3>
                    <div class="mt-4">
                        <canvas x-ref="interactionCanvas" width="300" height="375" @mousedown="isDragging = true; lastMousePos = { x: $event.offsetX, y: $event.offsetY }" @mousemove.prevent="handleMouseMove($event)" @mouseup="isDragging = false" @mouseleave="isDragging = false" @touchstart.prevent="isDragging = true; lastMousePos = { x: $event.touches[0].clientX - $el.getBoundingClientRect().left, y: $event.touches[0].clientY - $el.getBoundingClientRect().top }" @touchmove.prevent="handleTouchMove($event)" @touchend="isDragging = false" class="w-full aspect-[4/5] bg-gray-800 rounded-md mt-2" :class="isDragging ? 'cursor-grabbing' : 'cursor-grab'"></canvas>
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Zoom: <span class="font-bold" x-text="(transform.scale * 100).toFixed(0) + '%'"></span></label>
                        <input type="range" min="0.1" max="5" step="0.01" x-model.debounce.50ms="transform.scale" @input="_watcher()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mt-1">
                        <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Rotasi: <span class="font-bold" x-text="transform.rotation.toFixed(0) + '°'"></span></label>
                        <input type="range" min="-180" max="180" x-model.debounce.50ms="transform.rotation" @input="_watcher()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mt-1">
                        <button @click="resetTransform()" class="mt-4 w-full text-sm py-2 px-4 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700">Reset Posisi Gambar</button>
                    </div>
                </div>
                <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">3. Tambahkan Teks Utama</h3>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Teks (bisa beberapa baris)</label>
                    <textarea rows="3" x-model.debounce.200ms="text" @input="_watcher()" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 rounded-md shadow-sm p-2 focus:ring-primary-500 focus:border-primary-500"></textarea>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Ukuran Font: <span class="font-bold" x-text="fontSize + 'px'"></span></label>
                    <input type="range" min="24" max="200" x-model.debounce.50ms="fontSize" @input="_watcher()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mt-1">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Posisi Vertikal: <span class="font-bold" x-text="textYPosition + '%'"></span></label>
                    <input type="range" min="0" max="100" x-model.debounce.50ms="textYPosition" @input="_watcher()" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mt-1">
                </div>
                <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg">
                     <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">4. Atur Tab Kategori</h3>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Teks Tab</label>
                    <input type="text" x-model.debounce.200ms="tabText" @input="_watcher()" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 rounded-md shadow-sm p-2 focus:ring-primary-500 focus:border-primary-500">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Warna Tab</label>
                    <div class="grid grid-cols-4 gap-2 mt-2">
                        <template x-for="color in tabColors" :key="color.value"><button @click="tabColor = color.value; _watcher()" class="w-full h-10 rounded-md border-2 transition-all" :class="tabColor === color.value ? 'border-blue-500 ring-2 ring-blue-300' : 'border-transparent'" :style="{ backgroundColor: color.value }" :title="color.name"></button></template>
                    </div>
                </div>
                <div class="border border-gray-200 dark:border-gray-700 p-5 rounded-lg">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300">5. Tambahkan Atribut</h3>
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Sumber Gambar</label>
                    <input type="text" x-model.debounce.200ms="sourceText" @input="_watcher()" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 rounded-md shadow-sm p-2 focus:ring-primary-500 focus:border-primary-500">
                    <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mt-4">Penulis</label>
                    <input type="text" x-model.debounce.200ms="authorText" @input="_watcher()" class="mt-1 block w-full border border-gray-300 dark:border-gray-600 dark:bg-gray-800 rounded-md shadow-sm p-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
            <!-- Kolom Kanan (Preview Final) -->
            <div class="w-full md:w-2/3 text-center flex flex-col items-center">
                <h3 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">Preview Final</h3>
                <div class="w-full md:w-2/3 aspect-[4/5] max-w-full mt-4">
                    <canvas x-ref="finalCanvas" class="w-full h-full border-2 border-gray-300 dark:border-gray-600 rounded-lg shadow-md"></canvas>
                </div>
                <button @click="downloadImage" class="mt-6 py-3 px-8 text-lg font-semibold text-white bg-primary-600 rounded-lg shadow-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-colors duration-200">
                    Download Poster
                </button>
            </div>
        </div>
    </div>

    <script>
        function posterGenerator(initialData = {}) {
            return {
                // Constants
                FINAL_CANVAS_WIDTH: 1080, FINAL_CANVAS_HEIGHT: 1350, FONT_FAMILY: 'Dortmund',
                tabColors: [ { name: 'Merah', value: '#FF4040' }, { name: 'Jingga', value: '#FF9F40' }, { name: 'Sian', value: '#409FFF' }, { name: 'Biru', value: '#4040FF' }, { name: 'Ungu', value: '#9F40FF' }, { name: 'Magenta', value: '#FF40FF' }, { name: 'Fuchsia', value: '#FF409F' }, ],
                
                // State initialization from initialData or defaults
                isLoading: false,
                userImageSrc: initialData.userImageSrc || null,
                text: initialData.text || 'Your Text Here\nSecond Line',
                fontSize: initialData.fontSize || 40,
                textYPosition: initialData.textYPosition || 72,
                sourceText: initialData.sourceText || 'Nama Fotografer',
                authorText: initialData.authorText || 'Nama Anda',
                tabText: initialData.tabText || 'KATEGORI',
                tabColor: initialData.tabColor || '#FF4040',
                isDragging: false,
                lastMousePos: { x: 0, y: 0 },
                transform: initialData.transform || { x: 1080 / 2, y: 1350 / 2, scale: 1, rotation: 0 },
                
                _userImage: null, _logoImage: null, _offscreenCanvas: null, _debounceTimeout: null,

                init() {
                    this._logoImage = new Image();
                    this._logoImage.src = '/images/logo/logo_w.webp';
                    this._logoImage.onload = () => this.redrawAll();

                    this._offscreenCanvas = document.createElement('canvas');
                    this._offscreenCanvas.width = this.FINAL_CANVAS_WIDTH;
                    this._offscreenCanvas.height = this.FINAL_CANVAS_HEIGHT;
                    
                    if (this.userImageSrc) {
                        this._userImage = new Image();
                        this._userImage.crossOrigin = "anonymous";
                        this._userImage.src = this.userImageSrc;
                        this._userImage.onload = () => { this.redrawAll(); };
                    } else {
                        this.redrawAll();
                    }
                },
                
                handleImageUpload(event) {
                    const file = event.target.files?.[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.userImageSrc = e.target.result;
                            this._userImage = new Image();
                            this._userImage.src = this.userImageSrc;
                            this._userImage.onload = () => { this.calculateInitialTransform(); };
                        };
                        reader.readAsDataURL(file);
                    }
                },
                calculateInitialTransform() {
                    if (!this._userImage) return;
                    const scaleX = this.FINAL_CANVAS_WIDTH / this._userImage.width;
                    const scaleY = this.FINAL_CANVAS_HEIGHT / this._userImage.height;
                    const initialScale = Math.max(scaleX, scaleY);
                    this.transform = { x: this.FINAL_CANVAS_WIDTH / 2, y: this.FINAL_CANVAS_HEIGHT / 2, scale: initialScale, rotation: 0 };
                    this._watcher();
                },
                resetTransform() {
                    if(this.userImageSrc) this.calculateInitialTransform();
                },
                
                handleMouseMove(event) {
                    if (!this.isDragging || !this.userImageSrc) return;
                    const scaleRatio = this.FINAL_CANVAS_WIDTH / this.$refs.interactionCanvas.width;
                    const dx = (event.offsetX - this.lastMousePos.x) * scaleRatio;
                    const dy = (event.offsetY - this.lastMousePos.y) * scaleRatio;
                    this.transform = { ...this.transform, x: this.transform.x + dx, y: this.transform.y + dy };
                    this.lastMousePos = { x: event.offsetX, y: event.offsetY };
                    this._watcher();
                },
                handleTouchMove(event) {
                    if (!this.isDragging || !this.userImageSrc) return;
                    const canvasBounds = this.$refs.interactionCanvas.getBoundingClientRect();
                    const currentX = event.touches[0].clientX - canvasBounds.left;
                    const currentY = event.touches[0].clientY - canvasBounds.top;
                    const scaleRatio = this.FINAL_CANVAS_WIDTH / this.$refs.interactionCanvas.width;
                    const dx = (currentX - this.lastMousePos.x) * scaleRatio;
                    const dy = (currentY - this.lastMousePos.y) * scaleRatio;
                    this.transform = { ...this.transform, x: this.transform.x + dx, y: this.transform.y + dy };
                    this.lastMousePos = { x: currentX, y: currentY };
                    this._watcher();
                },

                _watcher() {
                    if (this._debounceTimeout) clearTimeout(this._debounceTimeout);
                    this._debounceTimeout = setTimeout(() => {
                        this.redrawAll();
                    }, 50);
                },

                async redrawAll() {
                    const offscreenCtx = this._offscreenCanvas.getContext('2d');
                    if (!offscreenCtx) return;

                    if (this.userImageSrc && this._userImage?.complete && this._userImage?.naturalHeight !== 0) {
                        offscreenCtx.fillStyle = '#2D3748';
                        offscreenCtx.fillRect(0, 0, this.FINAL_CANVAS_WIDTH, this.FINAL_CANVAS_HEIGHT);
                        offscreenCtx.save();
                        offscreenCtx.translate(this.transform.x, this.transform.y);
                        offscreenCtx.rotate(this.transform.rotation * Math.PI / 180);
                        offscreenCtx.scale(this.transform.scale, this.transform.scale);
                        offscreenCtx.drawImage(this._userImage, -this._userImage.width / 2, -this._userImage.height / 2);
                        offscreenCtx.restore();
                    } else {
                        offscreenCtx.fillStyle = 'black';
                        offscreenCtx.fillRect(0, 0, this.FINAL_CANVAS_WIDTH, this.FINAL_CANVAS_HEIGHT);
                    }
                    
                    const interactionCtx = this.$refs.interactionCanvas.getContext('2d');
                    if (interactionCtx) {
                        interactionCtx.clearRect(0, 0, this.$refs.interactionCanvas.width, this.$refs.interactionCanvas.height);
                        interactionCtx.drawImage(this._offscreenCanvas, 0, 0, this.$refs.interactionCanvas.width, this.$refs.interactionCanvas.height);
                    }

                    const finalCtx = this.$refs.finalCanvas.getContext('2d');
                    if (!finalCtx) return;

                    this.$refs.finalCanvas.width = this.FINAL_CANVAS_WIDTH;
                    this.$refs.finalCanvas.height = this.FINAL_CANVAS_HEIGHT;

                    await Promise.all([ document.fonts.load(`bold ${this.fontSize}px ${this.FONT_FAMILY}`), document.fonts.load(`normal 22px ${this.FONT_FAMILY}`), document.fonts.load(`bold 22px ${this.FONT_FAMILY}`), document.fonts.load(`bold 28px ${this.FONT_FAMILY}`) ]);

                    finalCtx.drawImage(this._offscreenCanvas, 0, 0);

                    const rowAnchorY = this.FINAL_CANVAS_HEIGHT * (2 / 3);
                    const gradient = finalCtx.createLinearGradient(0, this.FINAL_CANVAS_HEIGHT, 0, rowAnchorY);
                    gradient.addColorStop(0, 'rgba(0, 0, 0, 1)');
                    gradient.addColorStop(1, 'rgba(0, 0, 0, 0)');
                    finalCtx.fillStyle = gradient;
                    finalCtx.fillRect(0, rowAnchorY, this.FINAL_CANVAS_WIDTH, this.FINAL_CANVAS_HEIGHT - rowAnchorY);
                    
                    finalCtx.font = `bold ${this.fontSize}px ${this.FONT_FAMILY}`;
                    finalCtx.fillStyle = 'white';
                    finalCtx.textAlign = 'center';
                    finalCtx.textBaseline = 'top'; 
                    const lines = this.text.split('\n');
                    const lineHeight = this.fontSize * 1.2;
                    const startY = this.FINAL_CANVAS_HEIGHT * (this.textYPosition / 100);
                    lines.forEach((line, index) => {
                        finalCtx.fillText(line, this.FINAL_CANVAS_WIDTH / 2, startY + (index * lineHeight));
                    });

                    if (this._logoImage?.complete && this._logoImage?.naturalHeight !== 0) {
                        const newLogoWidth = 250;
                        const newLogoHeight = this._logoImage.height * (newLogoWidth / this._logoImage.width);
                        finalCtx.drawImage(this._logoImage, this.FINAL_CANVAS_WIDTH - 50 - newLogoWidth, rowAnchorY - (newLogoHeight / 2), newLogoWidth, newLogoHeight);
                    }
                    
                    const tabHeight = 50;
                    const tabWidth = (this.FINAL_CANVAS_WIDTH / 2) - 50;
                    finalCtx.fillStyle = this.tabColor;
                    finalCtx.fillRect(50, rowAnchorY - (tabHeight / 2), tabWidth, tabHeight);

                    finalCtx.font = `bold 28px ${this.FONT_FAMILY}`;
                    finalCtx.fillStyle = 'white';
                    finalCtx.textAlign = 'left';
                    finalCtx.textBaseline = 'middle';
                    finalCtx.fillText(this.tabText.toUpperCase(), 50 + 20, rowAnchorY);
                    
                    const footerY = this.FINAL_CANVAS_HEIGHT - 50;
                    finalCtx.fillStyle = 'white';
                    finalCtx.textBaseline = 'bottom';
                    finalCtx.font = `normal 22px ${this.FONT_FAMILY}`;
                    finalCtx.textAlign = 'left';
                    finalCtx.fillText(`SUMBER: ${this.sourceText.toUpperCase()}`, 50, footerY);
                    finalCtx.font = `bold 22px ${this.FONT_FAMILY}`;
                    finalCtx.textAlign = 'center';
                    finalCtx.fillText('KINARINOMO.COM', this.FINAL_CANVAS_WIDTH / 2, footerY);
                    finalCtx.font = `normal 22px ${this.FONT_FAMILY}`;
                    finalCtx.textAlign = 'right';
                    finalCtx.fillText(`PENULIS: ${this.authorText.toUpperCase()}`, this.FINAL_CANVAS_WIDTH - 50, footerY);
                },
                
                downloadImage() {
                    const link = document.createElement('a');
                    link.download = 'poster-final.png';
                    link.href = this.$refs.finalCanvas.toDataURL('image/png', 1.0);
                    link.click();
                },

                saveToServer() {
                    if (this.isLoading) return;
                    this.isLoading = true;

                    this.redrawAll().then(() => {
                        const imageData = this.$refs.finalCanvas.toDataURL('image/png', 1.0);
                        const title = this.text.split('\n')[0].trim() || 'Poster Tanpa Judul';

                        Livewire.dispatch('savePoster', {
                            imageData: imageData,
                            title: title,
                            transform: this.transform,
                            author: this.authorText,
                            source: this.sourceText,
                            category: this.tabText
                        });
                    });
                }
            }
        }
    </script>
</x-filament-panels::page>