<template>
    <div>
        <h1>Componente Home</h1>
        <div>
            <router-link class="btn btn-primary" to="/newTask">
                New Task
            </router-link>
        </div>
        <div>
            <label for="filterCategory">Filter by Category:</label>
            <select v-model="selectedCategory" id="filterCategory">
                <option value="">All Categories</option>
                <option value="Work">Work</option>
                <option value="Home">Home</option>
                <option value="Personal">Personal</option>
            </select>
        </div>
        <main>
            <table v-if="filterTasks().length > 0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in filterTasks()" :key="task.id">
                        <td>{{ task.id }}</td>
                        <td>
                            <input v-model="task.task_name" />
                        </td>
                        <td>
                            <input v-model="task.task_description" />
                        </td>
                        <td>
                            <input v-model="task.task_status" />
                        </td>
                        <td>
                            <input v-model="task.task_category" />
                        </td>
                        <td>
                            <button @click="updateTask(task)">Update</button>
                            <button @click="deleteTask(task.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2 v-else>No tasks found.</h2>
        </main>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "tasks",
    data() {
        return {
            tasks: [],
            selectedCategory: "",
        };
    },
    created() {
        this.getTasks();
    },
    methods: {
        filterTasks() {
            if (this.selectedCategory === "") {
                return this.tasks;
            } else {
                return this.tasks.filter(
                    (task) => task.task_category === this.selectedCategory
                );
            }
        },
        async getTasks() {
            try {
                const response = await axios.get("/api/tasks");
                this.tasks = response.data.data;
                this.tasks.sort(
                    (a, b) => new Date(b.created_at) - new Date(a.created_at)
                );
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTask(id) {
            if (confirm("Are you sure you want to delete this task?")) {
                try {
                    await axios.delete(`/api/tasks/${id}`);
                    this.getTasks();
                } catch (error) {
                    console.log(error);
                }
            }
        },
        async updateTask(task) {
            if (confirm("Are you sure you want to update this task?")) {
                try {
                    await axios.put(`/api/tasks/${task.id}`, task);
                    this.getTasks();
                    console.log(task);
                } catch (error) {
                    console.log(error);
                }
            }
        },
    },
};
</script>
