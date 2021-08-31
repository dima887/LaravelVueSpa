<template>
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Добавить новое объявление</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addApartment" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <textarea name="title" class="form-control" id="title"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea name="description" class="form-control" id="description"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <textarea name="address" class="form-control" id="address"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Цена BYN</label>
                                <textarea name="price" class="form-control" id="price"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="area">Район</label>
                                <textarea name="area" class="form-control" id="area"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="metro">Метро</label>
                                <textarea name="metro" class="form-control" id="metro"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="appliances">Бытовая техника</label>
                                <textarea name="appliances" class="form-control" id="appliances"
                                          rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image"
                                               class="custom-file-input">
                                        <label class="custom-file-label" for="image">Выбрать файл</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "AddApartment",

    methods: {
        addApartment() {
            axios.post('/api/v1/ad')
        }
    }
}
</script>

<style scoped>

</style>
