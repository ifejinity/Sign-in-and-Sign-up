import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'

createInertiaApp({
    title: title => `Jeffrey Lonzanida | ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .component('Head', Head)
        .component('Link', Link)
        .use(plugin)
        .mount(el)
    },
    progress: {
        delay: 0,
        color: '#004A7C',
        includeCSS: true,
        showSpinner: false,
    },
})