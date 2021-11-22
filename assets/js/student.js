import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { createPopper } from '@popperjs/core'
import PortalVue from 'portal-vue'
import vuetify from '../plugins/vuetify' 
import Student from '../components/student/AddStudent.vue';

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(createPopper)
Vue.use(PortalVue)

new Vue({
    vuetify,
    components:{Student}
}).$mount('#student')