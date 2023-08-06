<template>
    <div>
        <h1>Componente Home</h1>
        <div>
            <router-link class="btn btn-primary" to="/newTask">
                New Task
            </router-link>
        </div>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" :key="task.id">
                        <td>{{ task.id }}</td>
                        <td>{{ task.task_name }}</td>
                        <td>{{ task.task_description }}</td>
                        <td>{{ task.task_status }}</td>
                        <td>{{ task.task_category }}</td>
                        <td>
                            <router-link
                                v-if="task.id"
                                class="btn btn-primary"
                                :to="{
                                    name: 'updateTask',
                                    params: { id: task.id },
                                }"
                            >
                                Update
                            </router-link>
                            <button @click="deleteTask(task.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</template>

<script>
export default {
    name: "tasks",
    data() {
        return {
            tasks: [],
        };
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
    },
};
</script>
