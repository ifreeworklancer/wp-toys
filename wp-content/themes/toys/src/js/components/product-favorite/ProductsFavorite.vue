<template>
    <div class="row">
        <product-favorite class="col-md-6 col-lg-4 catalog-card-wrapper" v-if="posts.length" v-for="post in posts"
                          :post="post" :key="post.id" v-on:remove-favorite="removeFavorite(post)"/>
    </div>
</template>

<script>
    import ProductFavorite from './ProductFavorite';

    export default {
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
                console.log(post);
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