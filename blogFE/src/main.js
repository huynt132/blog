import Vue from "vue";
import App from "./views/App.vue";
import {BootstrapVue, BootstrapVueIcons} from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Routes from "./routes";
import VueRouter from "vue-router";
import Vuex from 'vuex'
import storeConfig from "./store";
import axios from 'axios';
import VueAxios from 'vue-axios'
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(VueObserveVisibility)
Vue.use(VueAxios,axios);
Vue.use(Vuex)
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);

const store = new Vuex.Store(storeConfig);

Vue.config.productionTip = false;
const router = new VueRouter({
    routes: Routes,
});
new Vue({
    render: (h) => h(App),
    router: router,
    store
}).$mount("#app");
