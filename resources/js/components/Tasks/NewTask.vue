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
                <!-- <input
                    v-model="taskCategory"
                    type="text"
                    id="task_category"
                    required
                /> -->
                <select v-model="taskCategory" id="task_category">
                    <option value="None">None</option>
                    <option value="Work">Work</option>
                    <option value="Home">Home</option>
                    <option value="Personal">Personal</option>
                </select>
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
                    console.log("Task created:", response.data);
                    this.$router.push({ name: "home" });
                })
                .catch((error) => {
                    console.error("Error creating task:", error);
                });
        },
    },
};
</script>
