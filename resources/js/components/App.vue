<template>
    <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid">
            <router-link class="navbar-brand" to="/"> ToDo App </router-link>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/newTask">
                            Tasks
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <router-view></router-view>
</template>

<script>
export default {};
</script>
