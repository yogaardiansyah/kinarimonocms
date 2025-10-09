@php
    $backgroundImage = asset('images/background/bg.jpg');
    $mascotImage = asset('images/mascot/kirara_ai1.webp');
@endphp

<section
    class="min-h-screen w-full bg-cover bg-center flex items-center justify-center p-6 md:p-12 lg:p-20"
    style="background-image: url('{{ $backgroundImage }}')"
>
    <div class="flex flex-col-reverse md:flex-row items-center justify-center w-full max-w-7xl gap-10">
        <div class="flex-1 flex justify-center w-full">
            <div
                class="max-w-md w-full bg-white/10 backdrop-blur-md shadow-xl rounded-xl p-6 sm:p-8 md:p-10 text-white"
            >
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-semibold mb-4 text-left">
                    Jadilah Bagian dari Cerita Kami
                </h1>

                <div id="feedback-message" class="hidden rounded-md relative mb-4 px-4 py-3" role="alert">
                    <span class="block sm:inline"></span>
                </div>
             
                <form id="join-community-form" action="{{ route('community.apply') }}" method="POST" class="space-y-5 text-left">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium mb-1 text-white/80">Nama Kamu</label>
                        <input id="name" name="name" type="text" placeholder="Masukkan namamu" required class="w-full p-3 border border-white/30 rounded-md bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"/>
                    </div>
                    <div>
                        <label for="instagram" class="block text-sm font-medium mb-1 text-white/80">Username Instagram</label>
                        <input id="instagram" name="instagram" type="text" placeholder="username (untuk kami lihat karyamu)" required class="w-full p-3 border border-white/30 rounded-md bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"/>
                    </div>
                    <div>
                        <label for="reason" class="block text-sm font-medium mb-1 text-white/80">Kenapa ingin bergabung dengan tim Kinarimono?</label>
                        <textarea id="reason" name="reason" rows="3" placeholder="Ceritakan sedikit tentang passion-mu..." required class="w-full p-3 border border-white/30 rounded-md bg-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-transparent transition"></textarea>
                    </div>
                    <button id="submit-button" type="submit" class="w-full py-3 bg-purple-600 text-white font-semibold rounded-md hover:bg-purple-700 transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900">Kirim Aplikasi Bergabung</button>
                </form>
                <p class="mt-6 text-xs text-white/70 text-left">Dengan mengirim aplikasi, kamu menyatakan telah membaca dan setuju dengan prinsip komunitas kami.</p>
            </div>
        </div>
        <div class="flex-1 flex justify-center items-center">
            <img src="{{ $mascotImage }}" alt="Kinarimono Mascot" class="w-full max-w-xl h-auto object-contain drop-shadow-2xl"/>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('join-community-form');
        const submitButton = document.getElementById('submit-button');
        const feedbackMessage = document.getElementById('feedback-message');

        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            const originalButtonText = submitButton.innerHTML;
            submitButton.innerHTML = 'Mengirim...';
            submitButton.disabled = true;
            feedbackMessage.classList.add('hidden');
            feedbackMessage.classList.remove('bg-green-500/30', 'border-green-400', 'text-green-200', 'bg-red-500/30', 'border-red-400', 'text-red-200');
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        // Perbaikan Kunci: Header 'Accept' ditambahkan
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                });

                const result = await response.json();

                if (response.ok) {
                    feedbackMessage.querySelector('span').textContent = result.message;
                    feedbackMessage.classList.add('bg-green-500/30', 'border-green-400', 'text-green-200');
                    feedbackMessage.classList.remove('hidden');
                    form.reset();
                    setTimeout(() => { feedbackMessage.classList.add('hidden'); }, 7000);
                } else {
                    let errorMessage = result.message || 'Terjadi kesalahan.';
                    if (result.errors) { errorMessage = Object.values(result.errors)[0][0]; }
                    feedbackMessage.querySelector('span').textContent = errorMessage;
                    feedbackMessage.classList.add('bg-red-500/30', 'border-red-400', 'text-red-200');
                    feedbackMessage.classList.remove('hidden');
                }
            } catch (error) {
                feedbackMessage.querySelector('span').textContent = 'Koneksi gagal. Periksa internet Anda.';
                feedbackMessage.classList.add('bg-red-500/30', 'border-red-400', 'text-red-200');
                feedbackMessage.classList.remove('hidden');
                console.error('Fetch error:', error);
            } finally {
                submitButton.innerHTML = originalButtonText;
                submitButton.disabled = false;
            }
        });
    });
</script>