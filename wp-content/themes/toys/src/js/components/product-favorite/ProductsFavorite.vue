<template>
    <div class="row">
        <div class="col-md-6 col-lg-4 catalog-card-wrapper" v-if="posts.length" v-for="post in posts" :key="post.id">
            <a :href="post.permalink" class="catalog-card">
                <div class="catalog-card-view">
                    <figure :style="{ backgroundImage: `url('${post.image}')` }"></figure>
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
                        <div class="add-basket" @click.prevent="addBasket(post)">
                            <svg width="15" height="15">
                                <use xlink:href="#basket-icon"></use>
                            </svg>
                        </div>
                        <div class="add-feedback" @click.prevent="showModal">
                            <svg width="15" height="15">
                                <use xlink:href="#feedback-icon"></use>
                            </svg>
                        </div>
                        <div class="add-favorite is-favorite" @click.prevent="removeFavorite(post)">
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
            }
        },
        methods: {
            showModal() {
                this.$store.commit('showModal');
            },
            addBasket(post) {
                this.$store.commit('setBasket', [post]);
            },
            removeFavorite(post) {
                this.$store.dispatch('deleteFavoriteItem', post);
                this.getPosts();
            },
            getPosts() {
                this.posts = this.$store.state.favorite.items;
            },
        },
        mounted() {
            this.$store.dispatch('getFavorite');
            this.getPosts();
        }
    }
</script>