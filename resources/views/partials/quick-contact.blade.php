<!-- Floating Quick Action Buttons (Phone on Left, Zalo on Right - Newsun Style) -->

<!-- Left: Red Circular Phone Hotline -->
<div class="fixed bottom-6 left-6 z-40 select-none">
    <a href="tel:0988666888" 
       class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#e11b22] text-white shadow-xl hover:scale-110 transition-transform" 
       title="Gọi Hotline: 0988.666.888">
        <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
        </svg>
    </a>
</div>

<!-- Right: Blue Circular Zalo & Scroll to top -->
<div class="fixed bottom-6 right-6 z-40 flex flex-col items-center space-y-3 select-none">
    <!-- Back to top button -->
    <button type="button" 
            id="backToTopBtn" 
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
            class="hidden w-10 h-10 rounded-full bg-slate-700/80 hover:bg-slate-900 text-white items-center justify-center shadow-md transition-all"
            title="Lên đầu trang">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
        </svg>
    </button>

    <!-- Zalo Button -->
    <a href="https://zalo.me/0988666888" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="flex items-center justify-center w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#0068ff] text-white shadow-xl hover:scale-110 transition-transform" 
       title="Tư vấn Zalo">
        <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none">
            <path d="M24 4C12.954 4 4 12.06 4 22c0 5.485 2.76 10.377 7.152 13.784L9.2 43.1a1 1 0 001.448 1.118l8.36-4.524C20.62 40.16 22.28 40.4 24 40.4c11.046 0 20-8.06 20-18.4S35.046 4 24 4z" fill="#0068FF"/>
            <path d="M16 18h16v3l-10 10h10v3H16v-3l10-10H16v-3z" fill="#fff"/>
        </svg>
    </a>
</div>

<script>
    window.addEventListener('scroll', () => {
        const btn = document.getElementById('backToTopBtn');
        if (btn) {
            if (window.scrollY > 300) {
                btn.classList.remove('hidden');
                btn.classList.add('flex');
            } else {
                btn.classList.add('hidden');
                btn.classList.remove('flex');
            }
        }
    });
</script>
