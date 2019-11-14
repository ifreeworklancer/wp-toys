<template>
    <div class="checkout-catalog">

        <checkout-item v-if="posts.length" v-for="post in posts"
                       :value-text="valueText"
                       :price-text="priceText"
                       :post="post" :key="post.id"/>
        <div class="checkout-result">
            {{resultText}} <span class="font-weight-bold text-secondary">{{basket.amount}}</span> грн
        </div>
    </div>
</template>

<script>
    import CheckoutItem from './CheckoutItem';

    export default {
        props: {
            resultText: String,
            valueText: String,
            priceText: String,
        },
        data() {
            return {
                posts: [],
            }
        },
        computed: {
            basket() {
                return this.$store.state.basket;
            }
        },
        components: {
            CheckoutItem
        },
        methods: {
            getPosts() {
                this.posts = this.$store.state.basket.items;
            },
        },
        mounted() {
            this.getPosts();
        }
    }
</script>