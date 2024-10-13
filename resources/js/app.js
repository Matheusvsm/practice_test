import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router/index.js";


console.log('Vue está sendo montado!');
// createApp(App).mount('#app')
createApp(App).use(router).mount("#app");
