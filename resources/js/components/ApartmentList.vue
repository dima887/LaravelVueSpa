<template>
    <div v-if="apartments.length > 0">
        <h1>Список объявлений</h1>
        <transition-group name="apartment-list">
            <apartment-item v-for="apartment in apartments"
                            :apartment="apartment"
                            :src="apartment.image"
                            :key="apartment.id"
                            @getIdUpdate="$emit('getIdUpdate', apartment.id)"
                            @delete="$emit('delete', apartment.id)"
            ></apartment-item>
        </transition-group>

    </div>
    <div v-else>
        <h1>Список объявлений пуст</h1>
    </div>
</template>

<script>
import ApartmentItem from "./ApartmentItem";
export default {
    name: "Apartment-list",
    components: {ApartmentItem},
    props: {
        apartments: {
            type: Array,
            required: true,
        }
     }
}
</script>

<style scoped>
.apartment-list-item {
    display: inline-block;
    margin-right: 10px;
}
.apartment-list-enter-active,
.apartment-list-leave-active {
    transition: all 1s ease;
}
.apartment-list-enter-from,
.apartment-list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}

.apartment-list-move {
    transition: transform 1s ease;
}
</style>
