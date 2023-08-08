<!-- <template>
    <main class="mt-5 container">
        <div>
            <router-link class="btn btn-primary mb-4" to="/newTask">
                Add Task
            </router-link>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label for="filterCategory">Filter by Category:</label>
                <select
                    class="form-select mt-2 mb-5"
                    v-model="selectedCategory"
                    id="filterCategory"
                >
                    <option value="">All Categories</option>
                    <option value="Work">Work</option>
                    <option value="Home">Home</option>
                    <option value="Personal">Personal</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-4">
                <label class="mb-2" for="search">Search by Task Name:</label>
                <input
                    class="form-control"
                    v-model="searchQuery"
                    id="search"
                    type="text"
                />
            </div>
        </div>

        <table class="table table-striped mt-4" v-if="filteredTasks.length > 0">
            <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Finished</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in filteredTasks" :key="task.id">
                    <td>
                        <input
                            class="form-control"
                            v-model="task.task_name"
                            :class="{
                                'text-decoration-line-through opacity-50':
                                    task.task_status,
                            }"
                        />
                    </td>
                    <td>
                        <textarea
                            class="form-control"
                            v-model="task.task_description"
                            style="height: 5rem"
                            :class="{
                                'text-decoration-line-through opacity-25':
                                    task.task_status,
                            }"
                        ></textarea>
                    </td>
                    <td>
                        <input
                            class="form-control"
                            v-model="task.task_category"
                            :class="{
                                'text-decoration-line-through opacity-25':
                                    task.task_status,
                            }"
                        />
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="flexSwitchCheckDefault"
                                v-model="task.task_status"
                                @change="handleCheckbox(task)"
                            />
                        </div>
                    </td>
                    <td>
                        <button
                            class="btn btn-primary me-4"
                            @click="updateTask(task)"
                        >
                            Update
                        </button>
                        <button
                            class="btn btn-danger"
                            @click="deleteTask(task.id)"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <h2 v-else>No tasks found.</h2>
    </main>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "tasks",
    data() {
        return {
            tasks: [],
            selectedCategory: "",
            searchQuery: "",
        };
    },
    computed: {
        filteredTasks() {
            let tasks = this.tasks;

            if (this.searchQuery !== "") {
                tasks = tasks.filter((task) =>
                    task.task_name
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase())
                );
            }

            if (this.selectedCategory !== "") {
                tasks = tasks.filter(
                    (task) => task.task_category === this.selectedCategory
                );
            }

            return tasks;
        },
    },
    created() {
        this.getTasks();
    },
    methods: {
        async getTasks() {
            try {
                const response = await axios.get("/api/tasks");
                this.tasks = response.data.data;
                console.log(this.tasks);
                this.tasks.sort(
                    (a, b) => new Date(b.created_at) - new Date(a.created_at)
                );
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTask(id) {
            const result = await Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            });

            if (result.isConfirmed) {
                try {
                    await axios.delete(`/api/tasks/${id}`);
                    this.getTasks();
                } catch (error) {
                    console.log(error);
                }
            }
        },

        async updateTask(task) {
            const result = await Swal.fire({
                position: "center",
                icon: "success",
                title: "Your task has been updated!",
                showConfirmButton: false,
                timer: 1500,
            });

            try {
                await axios.put(`/api/tasks/${task.id}`, task);
                this.getTasks();
                console.log(task);
            } catch (error) {
                console.log(error);
            }
        },
        handleCheckbox(task) {
            if (task.task_status) {
            }
        },
    },
};
</script> -->

<template>
    <main class="mt-5 container">
        <div>
            <router-link class="btn btn-primary mb-4" to="/newTask">
                Add Task
            </router-link>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <label for="filterCategory">Filter by Category:</label>
                <select
                    class="form-select mt-2 mb-5"
                    v-model="selectedCategory"
                    id="filterCategory"
                >
                    <option value="">All Categories</option>
                    <option value="Work">Work</option>
                    <option value="Home">Home</option>
                    <option value="Personal">Personal</option>
                </select>
            </div>
            <div class="col-lg-6 col-sm-12">
                <label class="mb-2" for="search">Search by Task Name:</label>
                <input
                    class="form-control"
                    v-model="searchQuery"
                    id="search"
                    type="text"
                />
            </div>
        </div>
        <div class="table-responsive">
            <table
                class="table table-striped mt-4 table-sm"
                v-if="filteredTasks.length > 0"
            >
                <thead>
                    <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Finished</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in filteredTasks" :key="task.id">
                        <td>
                            <input
                                class="form-control"
                                v-model="task.task_name"
                                :class="{
                                    'text-decoration-line-through opacity-50':
                                        task.task_status,
                                }"
                            />
                        </td>
                        <td>
                            <textarea
                                class="form-control"
                                v-model="task.task_description"
                                style="height: 5rem"
                                :class="{
                                    'text-decoration-line-through opacity-25':
                                        task.task_status,
                                }"
                            ></textarea>
                        </td>
                        <td>
                            <input
                                class="form-control"
                                v-model="task.task_category"
                                :class="{
                                    'text-decoration-line-through opacity-25':
                                        task.task_status,
                                }"
                            />
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    role="switch"
                                    id="flexSwitchCheckDefault"
                                    v-model="task.task_status"
                                    @change="handleCheckbox(task)"
                                />
                            </div>
                        </td>
                        <td>
                            <button
                                class="btn btn-primary me-4 my-2"
                                @click="updateTask(task)"
                            >
                                Update
                            </button>
                            <button
                                class="btn btn-danger mb-2"
                                @click="deleteTask(task.id)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2 v-else>No tasks found.</h2>
        </div>
    </main>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "tasks",
    data() {
        return {
            tasks: [],
            selectedCategory: "",
            searchQuery: "",
        };
    },
    computed: {
        filteredTasks() {
            let tasks = this.tasks;

            if (this.searchQuery !== "") {
                tasks = tasks.filter((task) =>
                    task.task_name
                        .toLowerCase()
                        .includes(this.searchQuery.toLowerCase())
                );
            }

            if (this.selectedCategory !== "") {
                tasks = tasks.filter(
                    (task) => task.task_category === this.selectedCategory
                );
            }

            return tasks;
        },
    },
    created() {
        this.getTasks();
    },
    methods: {
        async getTasks() {
            try {
                const response = await axios.get("/api/tasks");
                this.tasks = response.data.data;
                console.log(this.tasks);
                this.tasks.sort(
                    (a, b) => new Date(b.created_at) - new Date(a.created_at)
                );
            } catch (error) {
                console.log(error);
            }
        },
        async deleteTask(id) {
            const result = await Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            });

            if (result.isConfirmed) {
                try {
                    await axios.delete(`/api/tasks/${id}`);
                    this.getTasks();
                } catch (error) {
                    console.log(error);
                }
            }
        },

        async updateTask(task) {
            const result = await Swal.fire({
                position: "center",
                icon: "success",
                title: "Your task has been updated!",
                showConfirmButton: false,
                timer: 1500,
            });

            try {
                await axios.put(`/api/tasks/${task.id}`, task);
                this.getTasks();
                console.log(task);
            } catch (error) {
                console.log(error);
            }
        },
        handleCheckbox(task) {
            if (task.task_status) {
            }
        },
    },
};
</script>
