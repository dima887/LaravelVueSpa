<template>
        <div class="block">
            <div class="product-item mb-3">
                <div class="product-img">
                    <img :src="apartment.image">
                </div>
                <div class="product-list">
                    <h3 v-html="apartment.title"></h3>
                    <p>{{apartment.description}}</p>
                    <span class="price" v-if="apartment.price">{{apartment.price}} BYN |</span>
                    <span class="price" v-else>Договорная цена |</span>

                    <span class="price" v-if="apartment.room">{{apartment.room}}-комн | </span>
                    <span class="price" v-else>0-комн | </span>
                    <span class="price">{{apartment.date}} | </span>
                    <span class="price">ID:{{apartment.id}}</span>
                    <div class="actions">
                        <div class="add-to-cart">
                            <router-link :src="apartment.image"
                                         :to="{name: 'adId', params: {id: apartment.id}}"
                                         class="cart-button">Просмотр</router-link>
                        </div>
                        <div class="add-to-cart">
                            <button @click="$emit('getIdUpdate')" class="my-cart-button">Редактировать | </button>
                            <button @click="$emit('delete')" class="my-cart-button">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "ApartmentItem",
    props: {
        apartment: {
            type: Array,
            required: true,
        }
    },
}
</script>

<style scoped>
.my-cart-button {
    background: none;
    border: none;
    color: #8C877C;
}

.block {
    /*min-height: 100px;*/
    /*max-height: 300px;*/
}

.product-item {
    width: 300px;
    margin: 0 auto;
    padding: 10px 10px 5px 10px;
    border: 1px solid #eee;
    background: white;
    font-family: "Open Sans";
    overflow: hidden;
    transition: .4s linear;
}
.product-img {
    transition: 1s ease-in-out;
}
.product-img:hover {
    transform: scale(1.1);
}
.product-img img {
    display: block;
    width: 100%;
}
.product-list {
    margin-top: 15px;
}
.product-list h3 {
    font-weight: 700;
    color: #39404B;
    margin: 0;
    text-transform: uppercase;
    font-size: 14px;
    line-height: 2;
}
.price {
    color: #E34D38;
    display: inline-block;
    margin-bottom: 12px;
}
.stars {
    height: 14px;
    line-height: 14px;
    margin: 7px 0;
}
.stars:before {
    content: "\f005\f005\f005\f005\f006";
    color: #EFB71C;
    font-size: 14px;
    font-family: FontAwesome;
}
.actions {
    border-top: 1px solid #eee;
    padding-top: 4px;
    font-size: 13px;
    height: 30px;
    line-height: 30px;
}
.actions:after {
    content: "";
    display: table;
    clear: both;
}
.add-to-cart, .add-to-links {
    float: left;
}
.cart-button {
    text-decoration: none;
    color: #8C877C;
    padding-right: 20px;
    border-right: 1px solid #ddd;
    transition: .4s linear;
}
.cart-button:before {
    content: "\f07a";
    font-family: FontAwesome;
    margin-right: 10px;
}
.add-to-cart:hover .cart-button, .wishlist:hover, .compare:hover, .my-cart-button:hover {
    color: #E34D38;
}
.wishlist, .compare {
    color: #8C877C;
    padding-left: 20px;
    transition: .4s linear;
}
.wishlist:after, .compare:after {
    display: inline-block;
    font-family: FontAwesome;
    font-size: 13px;
}
.wishlist:after {
    content: "\f004";
}
.compare:after {
    content: "\f079";
}
</style>
