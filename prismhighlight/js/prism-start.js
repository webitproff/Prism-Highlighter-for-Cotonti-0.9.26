document.addEventListener("DOMContentLoaded", function () {
    const codeBlocks = document.querySelectorAll("pre[class*='brush']");
    codeBlocks.forEach((codeBlock) => {
        let language = 'none';
        codeBlock.classList.forEach((cls) => {
            if (cls.startsWith('brush:')) {
                language = cls.replace('brush:', '');
            }
        });
        codeBlock.classList.add('language-' + language);
        const toolbar = document.createElement('div');
        toolbar.className = 'syntaxhighlighter-toolbar';
        const label = document.createElement('span');
        label.className = 'syntaxhighlighter-brush';
        label.textContent = language.toUpperCase();
        const btn = document.createElement('button');
        btn.className = 'syntaxhighlighter-copy-to-clipboard';
        btn.textContent = 'Copy';
        btn.onclick = function () {
            const text = codeBlock.textContent;
            navigator.clipboard.writeText(text).then(() => {
                btn.textContent = 'Copied!';
                setTimeout(() => { btn.textContent = 'Copy'; }, 1500);
            });
        };
        toolbar.append(label, btn);
        codeBlock.parentNode.insertBefore(toolbar, codeBlock);
    });
});
