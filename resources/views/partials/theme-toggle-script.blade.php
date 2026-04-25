<script>
    (() => {
        const STORAGE_KEY = 'corepine-theme';
        const LEGACY_KEY = 'theme';
        const CYCLE = ['light', 'dark', 'system'];
        const LABELS = {
            light: 'Light',
            dark: 'Dark',
            system: 'System',
        };
        const root = document.documentElement;
        const toggleButton = document.querySelector('[data-theme-toggle]');
        const icons = Array.from(document.querySelectorAll('[data-theme-icon]'));
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

        if (! toggleButton || icons.length === 0) {
            return;
        }

        const normalizePreference = (value) => {
            if (value === 'light' || value === 'dark' || value === 'system') {
                return value;
            }

            return 'system';
        };

        const readStoredPreference = () => {
            try {
                const stored = localStorage.getItem(STORAGE_KEY);
                const legacy = localStorage.getItem(LEGACY_KEY);
                const normalized = normalizePreference(stored ?? legacy);
                localStorage.setItem(STORAGE_KEY, normalized);
                localStorage.removeItem(LEGACY_KEY);

                return normalized;
            } catch (error) {
                // Ignore storage access errors and use current in-memory state.
            }

            return normalizePreference(root.dataset.themePreference);
        };

        const resolveTheme = (preference) => {
            if (preference === 'light' || preference === 'dark') {
                return preference;
            }

            return mediaQuery.matches ? 'dark' : 'light';
        };

        const applyThemeAndUi = (preference) => {
            const theme = resolveTheme(preference);
            const isDark = theme === 'dark';

            root.classList.toggle('dark', isDark);
            root.style.colorScheme = isDark ? 'dark' : 'light';
            root.dataset.themePreference = preference;

            icons.forEach((icon) => {
                const isVisible = icon.dataset.themeIcon === preference;
                icon.classList.toggle('hidden', ! isVisible);
            });

            const currentIndex = CYCLE.indexOf(preference);
            const nextPreference = CYCLE[(currentIndex + 1) % CYCLE.length];
            const message = `Theme: ${LABELS[preference]}. Click to switch to ${LABELS[nextPreference]}.`;

            toggleButton.setAttribute('aria-label', message);
            toggleButton.setAttribute('title', message);
            toggleButton.dataset.themeCurrent = preference;
        };

        const setStoredPreference = (preference) => {
            const normalizedPreference = normalizePreference(preference);

            try {
                localStorage.setItem(STORAGE_KEY, normalizedPreference);
                localStorage.removeItem(LEGACY_KEY);
            } catch (error) {
                // Ignore storage access issues and keep in-memory state.
            }
        };

        const cyclePreference = () => {
            const current = normalizePreference(toggleButton.dataset.themeCurrent ?? readStoredPreference());
            const currentIndex = CYCLE.indexOf(current);
            const nextPreference = CYCLE[(currentIndex + 1) % CYCLE.length];

            setStoredPreference(nextPreference);
            applyThemeAndUi(nextPreference);
        };

        const refreshFromStoredPreference = () => {
            applyThemeAndUi(normalizePreference(readStoredPreference()));
        };

        toggleButton.addEventListener('click', cyclePreference);

        if (typeof mediaQuery.addEventListener === 'function') {
            mediaQuery.addEventListener('change', () => {
                const preference = normalizePreference(readStoredPreference());

                if (preference === 'system') {
                    applyThemeAndUi(preference);
                }
            });
        } else if (typeof mediaQuery.addListener === 'function') {
            mediaQuery.addListener(() => {
                const preference = normalizePreference(readStoredPreference());

                if (preference === 'system') {
                    applyThemeAndUi(preference);
                }
            });
        }

        window.addEventListener('pageshow', refreshFromStoredPreference);
        window.addEventListener('storage', (event) => {
            if (event.key === STORAGE_KEY || event.key === LEGACY_KEY) {
                refreshFromStoredPreference();
            }
        });

        refreshFromStoredPreference();
    })();
</script>
