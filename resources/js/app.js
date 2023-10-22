import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import VueRecaptcha from "vue3-recaptcha-v2";

createInertiaApp({
    title: title => `Jeffrey Lonzanida | ${title}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const captchaKey = props.initialPage.props.recaptcha_site_key
        createApp({ render: () => h(App, props) })
        .component('Head', Head)
        .component('Link', Link)
        .use(plugin)
        .use(VueRecaptcha, { siteKey: captchaKey })
        .mount(el)
    },
    progress: {
        delay: 0,
        color: '#004A7C',
        includeCSS: true,
        showSpinner: false,
    },
})