## Dependências

### Overlay OverlayScrollbars 

https://www.npmjs.com/package/overlayscrollbars

Criar barras de rolagem flutuantes e transparentes que aparecem sobre o conteúdo apenas quando necessário

``npm install overlayscrollbars``

- No app.scss -> ``@import 'overlayscrollbars/styles/overlayscrollbars.css';``
- Na pasta ``resources\js``, criar o arquivo ``overlayScrollbars.js``
    ```php
    import {
        OverlayScrollbars,
        ScrollbarsHidingPlugin,
        SizeObserverPlugin,
        ClickScrollPlugin
    } from 'overlayscrollbars';

    // registrar os plugins ANTES de criar a instância
    OverlayScrollbars.plugin([ScrollbarsHidingPlugin, SizeObserverPlugin, ClickScrollPlugin]);


    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    }

    document.addEventListener("DOMContentLoaded", () => {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        if ( sidebarWrapper ) {
            OverlayScrollbars( sidebarWrapper,
            {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
    ```
    - **No app.js ->** ``import './overlayScrollbars.js';``
        - No body do blade tem que estar assim ``<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">``


