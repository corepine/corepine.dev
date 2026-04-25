<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

<script>
    (() => {
        const STORAGE_KEY = 'corepine-theme';
        const LEGACY_KEY = 'theme';

        const normalizePreference = (value) => {
            if (value === 'light' || value === 'dark' || value === 'system') {
                return value;
            }

            return 'system';
        };

        let preference = 'system';

        try {
            const stored = localStorage.getItem(STORAGE_KEY) ?? localStorage.getItem(LEGACY_KEY);
            preference = normalizePreference(stored);
            localStorage.setItem(STORAGE_KEY, preference);
            localStorage.removeItem(LEGACY_KEY);
        } catch (error) {
            // Ignore storage access errors and keep system default.
        }

        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = preference === 'dark' || (preference === 'system' && prefersDark);

        document.documentElement.classList.toggle('dark', isDark);
        document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
        document.documentElement.dataset.themePreference = preference;
    })();
</script>
