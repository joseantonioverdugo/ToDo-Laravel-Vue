<template>
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="text-center mb-4">Create New Task</h2>
                <div
                    class="col-md-6 border border-2 border-secondary-subtle rounded form"
                >
                    <form @submit.prevent="createTask">
                        <div class="mb-3">
                            <label for="task_name" class="form-label pt-4"
                                >Task Name</label
                            >
                            <input
                                v-model="taskName"
                                type="text"
                                class="form-control"
                                id="task_name"
                                required
                            />
                        </div>
                        <div class="mb-3">
                            <label for="task_description" class="form-label"
                                >Task Description</label
                            >
                            <textarea
                                v-model="taskDescription"
                                class="form-control"
                                id="task_description"
                                required
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="task_category" class="form-label"
                                >Task Category</label
                            >
                            <select
                                v-model="taskCategory"
                                class="form-select"
                                id="task_category"
                            >
                                <option value="None">None</option>
                                <option value="Work">Work</option>
                                <option value="Home">Home</option>
                                <option value="Personal">Personal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-4">
                            Create Task
                        </button>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <router-link class="btn btn-primary" to="/">
                        Go Back
                    </router-link>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
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
                    Swal.fire({
                        title: "Success!",
                        text: "Task created successfully!",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                    this.$router.push({ name: "home" });
                })
                .catch((error) => {
                    console.error("Error creating task:", error);
                });
        },
    },
};
</script>
