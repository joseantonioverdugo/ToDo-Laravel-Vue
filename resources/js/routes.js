const Home = () => import("./components/Home.vue");

const NewTask = () => import("./components/Tasks/NewTask.vue");

const UpdateTask = () => import("./components/Tasks/UpdateTask.vue");

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
    {
        name: "updateTask",
        path: "/updateTask/:id",
        component: UpdateTask,
    },
];
