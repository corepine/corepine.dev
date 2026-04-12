import './bootstrap';
import Alpine from 'alpinejs';
import hljs from 'highlight.js/lib/core';
import php from 'highlight.js/lib/languages/php';
import javascript from 'highlight.js/lib/languages/javascript';
import json from 'highlight.js/lib/languages/json';
import bash from 'highlight.js/lib/languages/bash';
import xml from 'highlight.js/lib/languages/xml';
import css from 'highlight.js/lib/languages/css';

window.Alpine = Alpine;

Alpine.start();

hljs.registerLanguage('php', php);
hljs.registerLanguage('js', javascript);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('json', json);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('sh', bash);
hljs.registerLanguage('xml', xml);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('css', css);

const highlightDocsCodeBlocks = () => {
    document.querySelectorAll('.docs-markdown pre code').forEach((block) => {
        hljs.highlightElement(block);
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', highlightDocsCodeBlocks);
} else {
    highlightDocsCodeBlocks();
}
