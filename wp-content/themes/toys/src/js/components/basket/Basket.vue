<template>
    <div class="row">
        <div class="col-12">
            <div class="basket-wrapper">
                <div class="basket-wrapper-header">
                    <div class="reset-basket">
                        Очистить корзину
                        <svg width="15" height="15">
                            <use xlink:href="#trash-icon"></use>
                        </svg>
                    </div>
                </div>
                <div class="basket-wrapper-body">
                    <basket-item v-if="posts.length" v-for="post in posts" :item="post" :key="post.id"/>
                </div>
                <div class="basket-wrapper-footer">
                    <div class="basket-wrapper-footer-description">
                        <div class="basket-result">
                            <span class="basket-result-text">Итог:</span> <span
                                class="basket-result-value font-weight-bold">{{basket.amount}}</span> грн
                        </div>
                        <a href="page-checkout.php" class="btn btn-primary">
                            Оформить заказ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BasketItem from './BasketItem';
    export default {
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
            getPosts() {
                this.posts = this.$store.state.basket.items;
            },
        },
        mounted() {
            this.getPosts();
        }
    }
</script>