import { createApp } from 'vue';
import App from './App.vue';
import router from './routes/router';
import Auth from './auth/Auth';
import CKEditor from '@ckeditor/ckeditor5-vue';
import * as LocationPicker from 'vue2-location-picker';
import "leaflet/dist/leaflet.css";

const app = createApp(App);

app.config.globalProperties.auth = Auth;

app.use(router)
.use(CKEditor)
.use(LocationPicker)
.mount('#app');
