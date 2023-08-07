const Home = () => import("./components/Home.vue");

const NewTask = () => import("./components/Tasks/NewTask.vue");

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "newTask",
        path: "/newTask",
        component: NewTask,
    },
];
