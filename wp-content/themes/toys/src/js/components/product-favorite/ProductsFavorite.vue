<template>
    <div class="row">
        <product-favorite v-if="posts.length" v-for="post in posts"
                          :post="post" :key="post.id" v-on:remove-favorite="removeFavorite(post)"/>
        <div class="col-12" v-if="!posts.length">
            <div class="no-products text-center">
                <h2 class="no-products-title text-light mb-4">
                    {{noResultText}}
                </h2>
                <a href="/" class="btn btn-primary">
                    {{buttonText}}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductFavorite from './ProductFavorite';

    export default {
        props: {
            noResultText: String,
            buttonText: String,
        },
        data() {
            return {
                posts: [],
            }
        },
        components: {
            ProductFavorite
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