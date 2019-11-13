<template>
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
        <div class="add-basket" :class="{'is-basket': checkBasket}" @click.prevent="addBasket">
            <svg width="18" height="18">
                <use xlink:href="#basket-icon"></use>
            </svg>
        </div>
        <div class="add-feedback" @click.prevent="showModal">
            <svg width="18" height="18">
                <use xlink:href="#feedback-icon"></use>
            </svg>
        </div>
        <div class="add-favorite" :class="{'is-favorite': checkFavorite}" @click.prevent="addFavorite">
            <svg width="18" height="18">
                <use xlink:href="#favorite-icon"></use>
            </svg>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                checkFavorite: false,
                checkBasket: false,
            }
        },
        props: {
            post: Array
        },
        methods: {
            showModal() {
                this.$store.commit('showModal');
            },
            addBasket() {
                this.checkBasket ? this.$store.dispatch('deleteBasketItem', this.post[0]) : this.$store.commit('setBasket', this.post);
                this.checkBasket = !this.checkBasket;
            },
            addFavorite() {
                this.checkFavorite ? this.$store.dispatch('deleteFavoriteItem', this.post[0]) : this.$store.commit('setFavorite', this.post);
                this.checkFavorite = !this.checkFavorite;
            }
        },
        mounted() {
            this.$store.dispatch('getFavorite');
            if (JSON.parse(localStorage.getItem('products_favorite'))) {
                JSON.parse(localStorage.getItem('products_favorite')).forEach(item => {
                    if (item.id === this.post[0].id) {
                        this.checkFavorite = true;
                        return this.checkFavorite;
                    }
                });
            }
            if (JSON.parse(localStorage.getItem('products_basket'))) {
                JSON.parse(localStorage.getItem('products_basket')).forEach(item => {
                    if (item.id === this.post[0].id) {
                        this.checkBasket = true;
                        return this.checkBasket;
                    }
                });
            }
        }
    }
</script>