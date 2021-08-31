<template>
    <button class="my_btn">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "MyButton"
}
</script>

<style scoped>
.my_btn {
    background: #3490dc;
    color: white;
    border-color:transparent;
    border-radius: 5px;
    padding: 5px;
}
</style>
