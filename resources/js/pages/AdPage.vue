<template>
    <div>
        <h1>Объявления</h1>
        <h3>Поиск</h3>
        <h3>Сортировка</h3>
        <span @click="showDialog">
            <my-button>Создать новое объявление</my-button>
        </span>
        <div v-if="success">
            <div class="container fixed-bottom alert alert-success alert-dismissible fade show" role="alert">
                <span class="d-inline-block">{{success}}</span>
                <button @click="closeSuccess" type="button" class="btn-close"></button>
            </div>
        </div>
        <my-dialog :show.sync="dialogVisible">
            <apartment-form @create="createNewAd"/>
        </my-dialog>

        <my-dialog :show.sync="dialogVisibleUpdate">
            <apartment-update-form :id="id" @updateAd="updateAd" />
        </my-dialog>

        <apartment-list v-if="!loading" @getIdUpdate="getIdUpdate" @delete="deleteApartment" :apartments="apartments"></apartment-list>
        <div v-else>
            <div class="d-flex justify-content-center">
                <div class="spinner-grow text-info" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ApartmentList from "../components/ApartmentList";
import MyButton from "../components/UI/MyButton";
import MyDialog from "../components/UI/MyDialog";
import ApartmentForm from "../components/ApartmentForm";
import ApartmentUpdateForm from "../components/ApartmentUpdateForm";

export default {
    name: "Ad",
    components: {ApartmentUpdateForm, ApartmentForm, MyDialog, MyButton, ApartmentList},
    props: [
        'upDialog'
    ],
    data() {
        return {
            apartments: [],
            id: null,
            dialogVisible: false,
            dialogVisibleUpdate: false,
            loading: false,
            success: null,
        }
    },
    methods: {
        closeSuccess() {
            this.success = null
        },
        showDialog() {
            this.dialogVisible = true;
        },
        createNewAd(ad) {
            if (!ad.image) {
                ad.image = 'https://vintage-crimea.ru/wp-content/uploads/2018/01/net-foto.png';
            }
            this.apartments.unshift(ad)
            this.dialogVisible = false
            this.success = 'Объявление успешно добавлено'
        },
        async getAllApartments() {
            try {
                this.loading = true
                const response = await axios.get('/api/v1/ad');
                this.apartments = response.data.data
            } catch (e) {
                alert('Ошибка')
            } finally {
                this.loading = false;
            }
        },
        async deleteApartment(id) {
            try {
                await axios.post('/api/v1/ad/' + id, {
                    _method: 'DELETE'
                })
                this.apartments = this.apartments.filter(a => a.id !== id)
                this.success = 'Объявление успешно удалено'
            } catch (e) {
                alert('Ошибка удаления')
            }
        },
        getIdUpdate(id) {
            this.id = id
            this.dialogVisibleUpdate = true
        },
        updateAd(data) {
            this.dialogVisibleUpdate = false
            if (!data.image) {
                data.image = 'https://vintage-crimea.ru/wp-content/uploads/2018/01/net-foto.png';
            }
            this.apartments = this.apartments.map(value => {
                if (value.id === data.id) {
                    return data
                }
                return value;
            })
            this.success = 'Объявление успешно отредактировано'
        }
    },
    mounted() {
        this.getAllApartments()
    },
}
</script>

<style scoped>

</style>
