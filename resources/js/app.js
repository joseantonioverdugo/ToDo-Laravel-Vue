import "./bootstrap";

import { createApp } from "vue";
import App from "./components/App.vue";

import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";

const router = new createRouter({
    history: createWebHistory(),
    routes: routes,
});

const app = createApp(App);
app.use(router);

app.mount("#app");
