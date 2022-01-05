import Vue from 'vue';
import App from './App.vue';
import { Button, HasError } from 'vform/src/components/bootstrap5'

import VueLodash from 'vue-lodash'
import lodash from 'lodash'

Vue.use(VueLodash, { lodash: lodash })
Vue.component('Button', Button);
Vue.component('HasError', HasError);

const app = new Vue({
    components: { App },
    template: '<App/>'
}).$mount("#app");
