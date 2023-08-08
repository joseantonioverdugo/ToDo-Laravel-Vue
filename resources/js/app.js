import "./bootstrap";

import { createApp } from "vue";
import App from "./components/App.vue";
import "../css/app.css";

import { createRouter, createWebHistory } from "vue-router";
import { routes } from "./routes";

const router = new createRouter({
    history: createWebHistory(),
    routes: routes,
});

const app = createApp(App);
app.use(router);

app.mount("#app");
