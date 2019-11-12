<template>
    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
        <div class="add-basket" @click.prevent="addBasket">
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
                this.$store.commit('setBasket', this.post);
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
        }
    }
</script>