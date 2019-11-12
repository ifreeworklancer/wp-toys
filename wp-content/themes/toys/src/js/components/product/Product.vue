<template>
    <div class="col-md-6 col-lg-4 catalog-card-wrapper">
        <a :href="post.permalink" class="catalog-card">
            <div class="catalog-card-view">
                <figure :style="{ backgroundImage: `url('${image}')` }"></figure>
            </div>
            <div class="catalog-card-description">
                <h6 class="title">
                    {{ post.title }}
                </h6>
                <div class="price">
                    <div class="price-value price-value--old" v-if="post.old_price">
                        <span class="font-weight-bold">
                           {{ post.old_price }}
                        </span>
                        грн
                    </div>
                    <div class="price-value">
                        <span class="font-weight-bold">
                           {{ post.price }}
                        </span>
                        грн
                    </div>
                </div>
                <div class="catalog-card-operation">
                    <div class="add-basket" @click.prevent="addBasket">
                        <svg width="15" height="15">
                            <use xlink:href="#basket-icon"></use>
                        </svg>
                    </div>
                    <div class="add-feedback" @click.prevent="showModal">
                        <svg width="15" height="15">
                            <use xlink:href="#feedback-icon"></use>
                        </svg>
                    </div>
                    <div class="add-favorite" :class="{'is-favorite': checkFavorite}" @click.prevent="addFavorite">
                        <svg width="15" height="15">
                            <use xlink:href="#favorite-icon"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="catalog-card-badges">
                <div class="catalog-card-badges-item catalog-card-badges-item--sale" v-if="post.old_price">
                    Sale
                </div>
            </div>
        </a>
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
            post: Object,
        },
        computed: {
            image() {
                return this.post.image;
            }
        },
        methods: {
            showModal() {
                this.$store.commit('showModal');
            },
            addBasket() {
                this.$store.commit('setBasket', [this.post]);
            },
            addFavorite() {
                this.checkFavorite ? this.$store.dispatch('deleteFavoriteItem', this.post) : this.$store.commit('setFavorite', [this.post]);
                this.checkFavorite = !this.checkFavorite;
            }
        },
        mounted() {
            if (JSON.parse(localStorage.getItem('products_favorite'))) {
                JSON.parse(localStorage.getItem('products_favorite')).forEach(item => {
                    if (item.id === this.post.id) {
                        this.checkFavorite = true;
                        return this.checkFavorite;
                    }
                });
            }
        }
    }

</script>