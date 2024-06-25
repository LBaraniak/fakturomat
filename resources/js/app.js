import './bootstrap';

import { createApp } from 'vue'

import Widget  from "./components/Rates/Widget.vue";

const app = createApp(Widget);
app.mount('#app');
