<template>
    <div class="my-overflow">
        <h1>Добавить новое объявление</h1>
        <form @submit.prevent enctype="multipart/form-data">
            <div v-if="errors">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div v-for="error in errors">
                        <div v-for="er in error">
                            <div v-for="e in er">
                                {{e}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <textarea v-model="ad.title" name="title" class="form-control" id="title"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea v-model="ad.description" name="description" class="form-control" id="description"
                          rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <textarea v-model="ad.address" name="address" class="form-control" id="address"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Цена BYN</label>
                <textarea v-model="ad.price" name="price" class="form-control" id="price"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="room">Кол-во комнат</label>
                <textarea v-model="ad.room" name="room" class="form-control" id="room"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="area">Район</label>
                <textarea v-model="ad.area" name="area" class="form-control" id="area"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="metro">Метро</label>
                <textarea v-model="ad.metro" name="metro" class="form-control" id="metro"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="appliances">Бытовая техника</label>
                <textarea v-model="ad.appliances" name="appliances" class="form-control" id="appliances"
                          rows="1"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" ref="image" @change="onImage" name="image" id="image"
                               class="custom-file-input">
                        <label class="custom-file-label" for="image">Выбрать файл</label>
                    </div>
                </div>
            </div>
            <button @click="saveApartment" type="submit" class="btn btn-primary mt-3">Добавить</button>
            <span v-if="errors" class="text-danger ml-3">Заполните все поля верно</span>
        </form>
    </div>
</template>

<script>
export default {
    name: "ApartmentForm",
    data() {
        return {
            ad: {
                title: '',
                description: '',
                address: '',
                price: '',
                area: '',
                room: '',
                metro: '',
                appliances: '',
                image: null,
            },
            errors: null,
        }
    },
    methods: {
        async saveApartment() {
            try {
                let save = new FormData();
                if (this.ad.image !== null) {
                    for (const key in this.ad) {
                        save.append(key, this.ad[key])
                    }
                }
                if (this.ad.image === null) {
                    delete this.ad.image
                    save = this.ad
                }
                const response = await axios.post('/api/v1/ad', save)
                this.$emit('create', response.data)
            } catch (error) {
                if (error.response.data.errors) {
                    this.errors = []
                    this.errors.push(error.response.data.errors)
                }
            }
        },
        onImage() {
            this.ad.image = this.$refs.image.files[0];
        }
    }
}
</script>

<style scoped>
.my-overflow {
    overflow: auto;
    height: 500px;
}
</style>
