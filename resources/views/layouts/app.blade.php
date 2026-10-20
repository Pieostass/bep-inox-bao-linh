<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Công Ty TNHH Bếp Inox Bảo Linh - Thiết Bị Bếp Công Nghiệp & Máy Thực Phẩm')</title>
    <meta name="description" content="@yield('meta_description', 'Công ty TNHH Bếp Inox Bảo Linh chuyên cung cấp và gia công thiết bị bếp công nghiệp, lò nướng bánh, tủ nấu cơm, nồi nấu phở điện inox 304, máy thực phẩm chất lượng cao, bảo hành 12 tháng tận nơi.')">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col selection:bg-orange-600 selection:text-white">

    <!-- Header & Navigation -->
    @include('partials.header')

    <!-- Flash Notification -->
    @if(session('success'))
        <div id="flash-toast" class="fixed top-24 right-5 z-50 bg-emerald-700 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center space-x-3 transition-all duration-300 transform translate-y-0">
            <svg class="w-6 h-6 text-emerald-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <p class="font-bold text-sm">Gửi thành công!</p>
                <p class="text-xs text-emerald-100">{{ session('success') }}</p>
            </div>
            <button type="button" onclick="document.getElementById('flash-toast').remove()" class="text-emerald-200 hover:text-white ml-3">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('flash-toast');
                if (toast) toast.remove();
            }, 6000);
        </script>
    @endif

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating Contact Widgets (Hotline + Zalo + Scroll to top) -->
    @include('partials.quick-contact')

    <!-- Quote Modal -->
    @include('partials.quote-modal')

    @stack('scripts')

    <script>
        // Modal helpers
        function openQuoteModal(productId = '', productName = '') {
            const modal = document.getElementById('quoteModal');
            const inputId = document.getElementById('modalProductId');
            const inputName = document.getElementById('modalProductName');
            const displayBox = document.getElementById('modalProductDisplay');
            const displayText = document.getElementById('modalProductDisplayText');
            const form = document.getElementById('quoteForm');
            const successState = document.getElementById('quoteSuccessState');

            if (!modal) return;

            // Reset states
            if (form) {
                form.classList.remove('hidden');
            }
            if (successState) {
                successState.classList.add('hidden');
            }

            if (inputId) inputId.value = productId || '';
            if (inputName) inputName.value = productName || '';

            if (displayBox && displayText) {
                if (productName) {
                    displayText.textContent = 'Quan tâm: ' + productName;
                    displayBox.classList.remove('hidden');
                } else {
                    displayBox.classList.add('hidden');
                }
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            // Auto-focus first input
            setTimeout(() => {
                const nameInput = document.getElementById('quoteCustomerName');
                if (nameInput) nameInput.focus();
            }, 100);
        }

        function closeQuoteModal() {
            const modal = document.getElementById('quoteModal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.classList.remove('overflow-hidden');
            }
        }

        function clearModalProduct() {
            const inputId = document.getElementById('modalProductId');
            const inputName = document.getElementById('modalProductName');
            const displayBox = document.getElementById('modalProductDisplay');
            if (inputId) inputId.value = '';
            if (inputName) inputName.value = '';
            if (displayBox) displayBox.classList.add('hidden');
        }

        function appendModalNote(text) {
            const notes = document.getElementById('quoteNotes');
            if (!notes) return;
            if (notes.value.trim().length > 0) {
                if (!notes.value.includes(text)) {
                    notes.value += ' • ' + text;
                }
            } else {
                notes.value = text;
            }
            notes.focus();
        }

        // Handle AJAX submission
        async function handleQuoteSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const submitBtn = document.getElementById('quoteSubmitBtn');
            const spinner = document.getElementById('quoteSubmitSpinner');
            const btnText = document.getElementById('quoteSubmitText');
            const successState = document.getElementById('quoteSuccessState');

            if (submitBtn) submitBtn.disabled = true;
            if (spinner) spinner.classList.remove('hidden');
            if (btnText) btnText.textContent = 'Đang gửi yêu cầu...';

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (response.ok) {
                    form.reset();
                    clearModalProduct();
                    form.classList.add('hidden');
                    if (successState) successState.classList.remove('hidden');
                } else {
                    // Fallback to normal submit if backend validation failed
                    form.submit();
                }
            } catch (err) {
                // If network/CORS error, submit traditionally
                form.submit();
            } finally {
                if (submitBtn) submitBtn.disabled = false;
                if (spinner) spinner.classList.add('hidden');
                if (btnText) btnText.textContent = 'GỬI YÊU CẦU BÁO GIÁ NGAY';
            }
        }

        // Close on clicking backdrop
        window.addEventListener('click', (e) => {
            const modal = document.getElementById('quoteModal');
            if (e.target === modal) {
                closeQuoteModal();
            }
        });

        // Close on Escape key
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeQuoteModal();
            }
        });

        // Copy Bank Account Number
        function copyToClipboard(text, btnElement) {
            navigator.clipboard.writeText(text).then(() => {
                const originalHtml = btnElement.innerHTML;
                btnElement.innerHTML = `
                    <svg class="w-4 h-4 text-emerald-600 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-emerald-700 font-bold text-xs">Đã sao chép!</span>
                `;
                setTimeout(() => {
                    btnElement.innerHTML = originalHtml;
                }, 2500);
            }).catch(err => {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>
</html>
