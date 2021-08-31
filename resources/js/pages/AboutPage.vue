<template>
    <div>
        <h1>About Page</h1>
        <p>{{aparts}}</p>
        <button @click="apart">button</button>
        <template v-if="aparts" v-for="ap in aparts">
            <p>{{ap.title}}</p>
        </template>
    </div>
</template>

<script>

import {mapActions, mapGetters} from "vuex";

export default {
    name: "About",
    data() {
        return {
            aparts: null
        }
    },
    computed: {
        ...mapGetters({
            test: 'auth/test',
        }),
    },
    methods: {
        ...mapActions({
            testAction: 'auth/testAction'
        }),
        save() {
            //this.$store.state.auth.test = 'start'
            this.testAction()
        },
        async apart() {
            //this.testAction()
            const response = await axios.get('/api/v1/isauth')
            this.aparts = response.data
        }
    },
}
</script>

<style scoped>

</style>
