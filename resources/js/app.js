require('./bootstrap');
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

//se incluye vue
import Vue from 'vue';

//se agregan los componentes
Vue.component('encabezado', require('./components/Header.vue').default);
Vue.component('books-list', require('./components/Books.vue').default);

//se llama a la instancia de vue
const app = new Vue({
    
    el: "#app"
    
});