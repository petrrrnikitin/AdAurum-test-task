<template>
    <router-view :user="user" class="container"></router-view>
</template>

<script>
    export default {
        name: "App",
        props: ['user']
    }
</script>
