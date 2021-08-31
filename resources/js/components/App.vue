<template>
    <div class="container">
        <navbar></navbar>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Navbar from "./Navbar";
export default {
    name: "App",
    components: {Navbar}
}
</script>

<style scoped>

</style>
