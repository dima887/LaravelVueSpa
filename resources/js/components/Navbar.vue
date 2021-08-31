<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <router-link class="navbar-brand" :to="{name: 'home'}">Главная</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <router-link class="nav-link" :to="{name: 'ad'}">Объявления</router-link>
                    <router-link class="nav-link" :to="{name: 'about'}">About</router-link>
                    <template v-if="!authenticated">
                    <router-link class="nav-link" :to="{name: 'login'}">Войти</router-link>
                    <router-link class="nav-link" :to="{name: 'register'}">Регистрация</router-link>
                    </template>
                    <template v-else>
<!--                    <span class="nav-link cursor">{{user.name}}</span>-->
                    <span @click="logout"  class="nav-link cursor">Выйти</span>
                    </template>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

import {mapActions, mapGetters} from "vuex";

export default {
    name: "Navbar",
    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user',
        })
    },
    methods: {
        ...mapActions({
            logoutAction: 'auth/logoutAction',
        }),
        async logout() {
            try {
                await axios.post('/api/v1/logout')
                this.logoutAction()
            } catch (e) {
                alert('Ошибка logout')
            }
        },
    },

}
</script>

<style scoped>
.cursor {
    cursor: pointer;
}
</style>
