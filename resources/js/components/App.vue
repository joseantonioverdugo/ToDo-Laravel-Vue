<template>
    <nav class="navbar navbar-expand-lg py-2">
        <div class="container-fluid">
            <router-link class="navbar-brand fs-2" to="/">
                ToDo App
            </router-link>
            <div
                class="collapse navbar-collapse"
                id="navbarSupportedContent"
            ></div>
        </div>
    </nav>
    <div class="view">
        <router-view></router-view>
    </div>
</template>

<script>
export default {};
import apiladas from "../../assets/apiladas.png";
</script>
