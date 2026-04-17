import './bootstrap';
import Alpine from 'alpinejs';
import hljs from 'highlight.js/lib/core';
import php from 'highlight.js/lib/languages/php';
import javascript from 'highlight.js/lib/languages/javascript';
import json from 'highlight.js/lib/languages/json';
import bash from 'highlight.js/lib/languages/bash';
import xml from 'highlight.js/lib/languages/xml';
import css from 'highlight.js/lib/languages/css';
import shell from 'highlight.js/lib/languages/shell';

window.Alpine = Alpine;

Alpine.start();

hljs.registerLanguage('php', php);
hljs.registerLanguage('js', javascript);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('json', json);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('sh', bash);
hljs.registerLanguage('shell', shell);
hljs.registerLanguage('xml', xml);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('blade', xml);
hljs.registerLanguage('css', css);

const docsLanguageLabels = {
    bash: 'Bash',
    blade: 'Blade',
    css: 'CSS',
    html: 'HTML',
    javascript: 'JavaScript',
    js: 'JavaScript',
    json: 'JSON',
    php: 'PHP',
    sh: 'Shell',
    shell: 'Shell',
    text: 'Text',
    xml: 'XML',
};

const getDocsBlockLanguage = (block) => {
    const languageClass = Array.from(block.classList).find((className) =>
        className.startsWith('language-') || className.startsWith('lang-'),
    );

    if (! languageClass) {
        return 'text';
    }

    return languageClass.replace(/^language-/, '').replace(/^lang-/, '') || 'text';
};

const formatDocsLanguageLabel = (language) => {
    if (docsLanguageLabels[language]) {
        return docsLanguageLabels[language];
    }

    return language.charAt(0).toUpperCase() + language.slice(1);
};

const createDocsCopyButton = (codeElement) => {
    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'docs-code-copy';
    button.setAttribute('aria-label', 'Copy code to clipboard');
    button.innerHTML = `
        <span class="docs-code-copy-label" data-copy-label>Copy</span>
        <span aria-hidden="true" class="docs-code-copy-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125H4.875A1.125 1.125 0 0 1 3.75 20.625V8.625c0-.621.504-1.125 1.125-1.125H8.25m7.5 9.75H19.125c.621 0 1.125-.504 1.125-1.125V4.125C20.25 3.504 19.746 3 19.125 3H9.375C8.754 3 8.25 3.504 8.25 4.125V7.5m7.5 9.75H9.375c-.621 0-1.125-.504-1.125-1.125V7.5m7.5 9.75v-9.75" />
            </svg>
        </span>
    `;

    button.addEventListener('click', async () => {
        const label = button.querySelector('[data-copy-label]');

        try {
            await navigator.clipboard.writeText(codeElement.textContent ?? '');

            if (label) {
                label.textContent = 'Copied';
            }

            button.dataset.copied = 'true';

            window.setTimeout(() => {
                if (label) {
                    label.textContent = 'Copy';
                }

                delete button.dataset.copied;
            }, 1800);
        } catch (error) {
            if (label) {
                label.textContent = 'Failed';
            }

            window.setTimeout(() => {
                if (label) {
                    label.textContent = 'Copy';
                }
            }, 1800);
        }
    });

    return button;
};

const enhanceDocsCodeBlocks = () => {
    document.querySelectorAll('.docs-markdown pre').forEach((pre) => {
        if (pre.dataset.docsCodeEnhanced === 'true') {
            return;
        }

        const code = pre.querySelector('code');

        if (! code) {
            return;
        }

        const language = getDocsBlockLanguage(code);
        const wrapper = document.createElement('div');
        wrapper.className = 'docs-code-block';

        const toolbar = document.createElement('div');
        toolbar.className = 'docs-code-toolbar';

        const label = document.createElement('span');
        label.className = 'docs-code-language';
        label.textContent = formatDocsLanguageLabel(language);

        toolbar.append(label, createDocsCopyButton(code));

        pre.classList.add('docs-code-pre');
        code.classList.add('docs-code');
        pre.dataset.docsCodeEnhanced = 'true';
        pre.parentNode?.insertBefore(wrapper, pre);
        wrapper.append(toolbar, pre);
    });
};

const highlightDocsCodeBlocks = () => {
    enhanceDocsCodeBlocks();

    document.querySelectorAll('.docs-markdown pre code').forEach((block) => {
        if (block.dataset.docsCodeHighlighted === 'true') {
            return;
        }

        hljs.highlightElement(block);
        block.dataset.docsCodeHighlighted = 'true';
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', highlightDocsCodeBlocks);
} else {
    highlightDocsCodeBlocks();
}
