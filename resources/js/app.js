import './bootstrap';
import  {Vue} from 'vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
//import {routes} from './routes';
 
//Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = new Vue({
    el: '#app',

});
app.use(VueAxios, axios);
//import ExampleComponent from './components/ExampleComponent.vue';
import MainComponent from './components/MainComponent.vue';
//import VideoRecorder from './components/VideoRecorder.vue';
app.component('main-component', MainComponent);
//app.component('example-component', ExampleComponent);
//app.component('video-component', VideoRecorder);

app.mount('#app');
