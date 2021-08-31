<template>
    <div v-if="!loading">
        <h1>Apartment by id = {{$route.params.id}}</h1>
        <div class="container mt-3">
            <div class="text-center">
                <h3 v-html="apartment.title"></h3>
                <img :src="apartment.image" class="rounded mt-3" alt="Нет изображения">
                <div class="card-body">
                    <span class="card-text" v-if="apartment.price">{{apartment.price}} BYN | </span>
                    <span class="card-text" v-else>Договорная цена | </span>

                    <span class="card-text" v-if="apartment.room">{{apartment.room}}-комн | </span>
                    <span class="card-text" v-else>Количество комнат: не указано | </span>

                    <span class="card-text">{{apartment.date}} | </span>
                    <span class="card-text">ID: {{apartment.id}}</span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col"></div>
                <div class="col-8">
                    <h3>Описание</h3>
                    <p>{{apartment.description}}</p>
                </div>
                <div class="col"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col"></div>
                <div class="col-8">
                    <h4>Дополнительно</h4>
                    <table class="table table-striped mt-3">
                        <tbody>
                        <tr>
                            <th scope="row">Адрес</th>
                            <td class="col-9" v-if="apartment.address">{{apartment.address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Метро</th>
                            <td class="col-9" v-if="apartment.metro">{{apartment.metro}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Бытовая техника</th>
                            <td class="col-9" v-if="apartment.appliances">{{apartment.appliances}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="d-flex justify-content-center">
            <div class="spinner-grow text-info" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdIdPage",
    data() {
        return {
            apartment: [],
            loading: true,
        }
    },
    methods: {
        async getApartment() {
            try {
                const response = await axios.get('/api/v1/ad/' + this.$route.params.id)
                this.apartment = response.data.data
            } catch (e) {
                alert('Ощибка показа по id')
            } finally {
                this.loading = false
            }
        }
    },
    mounted() {
        this.getApartment()
    },
}
</script>

<style scoped>

</style>
