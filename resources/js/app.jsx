// import { createRoot } from 'react-dom/client'
// import { createInertiaApp } from '@inertiajs/react'

// import '../css/app.css'
// // import './bootstrap';

// createInertiaApp({
//   resolve: async (name) => {
//     return (await import(`./Pages/${name}.jsx`)).default
//   },
//   setup({ el, App, props }) {
//     createRoot(el).render(<App {...props} />)
//   },
// })

import "./bootstrap";
import "../css/app.css";

import { createInertiaApp } from "@inertiajs/react";
import { createRoot } from "react-dom/client";
import Layout from "./components/layout/Layout.jsx";

createInertiaApp({
    title: (title) =>
        title ? `${title} - AMBIT10N Academy` : "AMBIT10N Academy",
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.jsx", { eager: true });
        let page = pages[`./Pages/${name}.jsx`];
        page.default.layout =
            page.default.layout || ((page) => <Layout children={page} />);
        return page;
    },
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
    progress: {
        color: "#c3a25d",
        showSpinner: true,
    },
});
