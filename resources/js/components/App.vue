<template>
    <div>
        <h1>{{ title }}</h1>
    </div>
    <prueba />
</template>

<script setup>
import prueba from "./prueba.vue";
const title = "Todo with Laravel and Vue";
</script>

<style scoped>
div {
    text-align: center;
    background-color: lightblue;
}
h1 {
    color: lightcoral;
}
</style>
