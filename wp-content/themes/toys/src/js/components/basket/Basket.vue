<template>
    <div class="row">
        <div class="col-12" v-if="posts.length">
            <div class="basket-wrapper">
                <div class="basket-wrapper-header">
                    <div class="reset-basket" @click="deleteAll">
                        {{resetText}}
                        <svg width="15" height="15">
                            <use xlink:href="#trash-icon"></use>
                        </svg>
                    </div>
                </div>
                <div class="basket-wrapper-body">
                    <basket-item v-for="post in posts" :item="post" :key="post.id"
                                 v-on:remove-basket="removeBasket(post)"/>
                </div>
                <div class="basket-wrapper-footer" v-if="posts.length">
                    <div class="basket-wrapper-footer-description">
                        <div class="basket-result">
                            <span class="basket-result-text">{{totalText}}</span>
                            <span class="basket-result-value font-weight-bold">
                                {{basket.amount}}
                            </span>
                            грн
                        </div>
                        <a :href="checkoutLink" class="btn btn-primary">
                            {{checkoutText}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" v-if="!posts.length">
            <div class="no-products text-center">
                <h2 class="no-products-title text-light mb-4">
                    {{noResultText}}
                </h2>
                <a href="/" class="btn btn-primary">
                    {{noResultButtonText}}
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import BasketItem from './BasketItem';

    export default {
        props: {
            resetText: String,
            checkoutText: String,
            checkoutLink: String,
            totalText: String,
            noResultText: String,
            noResultButtonText: String,
        },
        data() {
            return {
                posts: [],
            }
        },
        components: {
            BasketItem
        },
        computed: {
            basket() {
                return this.$store.state.basket;
            }
        },
        methods: {
            deleteAll() {
                this.$store.dispatch('deleteBasketAll');
                this.getPosts();
            },
            removeBasket(item) {
                this.$store.dispatch('deleteBasketItem', item);
                this.getPosts();
            },
            getPosts() {
                this.posts = this.$store.state.basket.items;
            },
        },
        mounted() {
            this.getPosts();
        }
    }
</script>