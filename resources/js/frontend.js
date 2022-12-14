
import Vue from "vue";
import VueRouter from "vue-router";
import App from "./App.vue";
import routes from "./router.js";
import "bootstrap";
import VueBraintree from 'vue-braintree'

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(fas, fab)

/* add font awesome icon component */
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

Vue.use(VueRouter);
Vue.use(VueBraintree)

new Vue({
    el: "#app",
    render: h => h(App),
    router: routes
})