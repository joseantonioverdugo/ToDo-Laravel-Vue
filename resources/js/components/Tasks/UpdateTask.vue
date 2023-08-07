<template>
    <div>
        <h2>Edit Task</h2>
        <form @submit.prevent="updateTask">
            <label for="taskName">Task Name:</label>
            <input
                v-model="editedTask.task_name"
                type="text"
                id="taskName"
                required
            />

            <label for="taskDescription">Task Description:</label>
            <textarea
                v-model="editedTask.task_description"
                id="taskDescription"
                required
            ></textarea>

            <button type="submit">Update Task</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "UpdateTask",
    data() {
        return {
            taskId: null,
            editedTask: {
                task_name: "",
                task_description: "",
            },
        };
    },
    created() {
        this.taskId = this.$route.params.id;

        this.fetchTaskDetails();
    },
    methods: {
        async fetchTaskDetails() {
            try {
                const response = await axios.get(`/api/tasks/${this.taskId}`);
                console.log(response.data.data);
                this.editedTask = response.data.data;
            } catch (error) {
                console.log(error);
            }
        },
        async updateTask() {
            try {
                await axios.put(`/api/tasks/${this.taskId}`, this.editedTask);
                this.$router.push("/");
            } catch (error) {
                console.log(error);
            }
        },
    },
};
</script>
