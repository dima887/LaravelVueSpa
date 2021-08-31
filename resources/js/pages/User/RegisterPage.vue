<template>
    <div class="container">
        <div v-if="errors">
            <div class="alert alert-danger d-flex align-items-center mt-2 alert-dismissible fade show" role="alert">
                <div v-for="error in errors">
                    <div v-for="er in error">
                        <div v-for="e in er">
                            <i class="bi bi-exclamation-triangle flex-shrink-0 me-2"></i> {{e}}
                        </div>
                    </div>
                </div>
                <button @click="closeErrors" type="button" class="btn-close"></button>
            </div>
        </div>
        <div v-if="loading">
            <div class="d-flex justify-content-center">
                <div class="spinner-grow text-info" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center container ">
            <div class="row my-border m-4 p-3">
                <h2 class="text-center text-white">Регистрация</h2>
                <form @submit.prevent>
                    <div class="form-group mt-3">
                        <label class="text-white" for="name">Имя</label>
                        <input v-model="form.name" type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Имя">
                    </div>
                    <div class="form-group mt-3">
                        <label class="text-white" for="name">Email</label>
                        <input v-model="form.email" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group mt-3">
                        <label class="text-white" for="password">Пароль</label>
                        <input v-model="form.password" type="password" name="password" class="form-control" id="password" placeholder="Пароль">
                    </div>
                    <div class="form-group mt-3">
                        <label class="text-white" for="password_confirmation">Введите пароль еще раз</label>
                        <input v-model="form.password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Введите пароль еще раз">
                    </div>
                    <button @click="saveForm" type="submit" class="btn my-btn-color mt-3">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RegisterPage",
    data(){
        return{
            form:{
                name: '',
                email: '',
                password:'',
                password_confirmation:''
            },
            loading: false,
            errors: null
        }
    },
    methods:{
        async saveForm(){
            this.loading = true
            try {
                await axios.post('/api/v1/register', this.form)
                axios.get('/api/v1/user').then((res)=>{
                    this.$store.state.auth.user = res.data
                })
                this.$store.state.auth.authenticated = true
                await this.$router.push({name: 'ad'})
            } catch (e) {
                this.errors = []
                this.errors.push(e.response.data.errors)
            } finally {
                this.loading = false
            }
        },
        closeErrors() {
            this.errors = null
        }
    }
}
</script>

<style scoped>
.my-border {
    border-radius: 10px;
    background: darkviolet;
}
.my-btn-color {
    background: tomato;
    color: white;
}
</style>
