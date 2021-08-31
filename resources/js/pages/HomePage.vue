<template>
    <div>
        <h1>Home Page</h1>
        <div @click="show">
        <my-button>Open</my-button>
        </div>
            <div v-if="visible">
            <div>Hello</div>
            <my-button><span  @click="hide">Close</span></my-button>
        </div>
    </div>
</template>

<script>
import MyButton from "../components/UI/MyButton";
export default {
    name: "Home",
    components: {MyButton},
    data() {
        return {
            visible: false,
        }
    },
    methods: {
        show() {
            this.visible = true;
        },
        hide () {
            this.visible = false;
        }
    }
}
</script>

<style scoped>

</style>
