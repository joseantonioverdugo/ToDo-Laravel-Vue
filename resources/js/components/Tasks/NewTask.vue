<!-- <template>
    <div>
        <h1>Componente NewTask</h1>
        <div>
            <form @submit.prevent="createTask">
                <div>
                    <label for="task_name">Task Name</label>
                    <input
                        type="text"
                        name="task_name"
                        id="task_name"
                        v-model="task.task_name"
                    />
                </div>
                <div>
                    <label for="task_description">Task Description</label>
                    <input
                        type="text"
                        name="task_description"
                        id="task_description"
                        v-model="task.task_description"
                    />
                </div>
                <div>
                    <label for="task_status">Task Status</label>
                    <input
                        type="text"
                        name="task_status"
                        id="task_status"
                        v-model="task.task_status"
                    />
                </div>
                <div>
                    <label for="task_category">Task Category</label>
                    <input
                        type="text"
                        name="task_category"
                        id="task_category"
                        v-model="task.task_category"
                    />
                </div>
                <div>
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
-->

<template>
    <div>
        <h2>Create New Task</h2>
        <form @submit.prevent="createTask">
            <div>
                <label for="task_name">Task Name</label>
                <input v-model="taskName" type="text" id="task_name" required />
            </div>
            <div>
                <label for="task_description">Task Description</label>
                <textarea
                    v-model="taskDescription"
                    id="task_description"
                    required
                ></textarea>
            </div>
            <div>
                <label for="task_category">Task Category</label>
                <input
                    v-model="taskCategory"
                    type="text"
                    id="task_category"
                    required
                />
            </div>
            <button type="submit">Create Task</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            taskName: "",
            taskDescription: "",
            taskCategory: "",
        };
    },
    methods: {
        createTask() {
            const newTask = {
                task_name: this.taskName,
                task_description: this.taskDescription,
                task_category: this.taskCategory,
            };

            axios
                .post("/api/tasks", newTask)
                .then((response) => {
                    // Handle the response from the API if needed
                    console.log("Task created:", response.data);
                    this.$router.push({ name: "home" });
                })
                .catch((error) => {
                    // Handle errors if the API request fails
                    console.error("Error creating task:", error);
                });
        },
    },
};
</script>

<style scoped>
/* Estilos específicos del componente aquí */
</style>
