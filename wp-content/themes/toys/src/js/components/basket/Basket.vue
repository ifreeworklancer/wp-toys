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
                    <div class="basket-item" v-if="posts.length" v-for="post in posts" :key="post.id">
                        <div class="basket-item-cell flex-column flex-md-row">
                            <div class="basket-item-view">
                                <figure :style="{ backgroundImage: `url('${post.image}')` }"></figure>
                            </div>
                            <div class="basket-item-description">
                                <h6 class="title">
                                    {{post.title}}
                                </h6>
                            </div>
                        </div>
                        <div class="basket-item-cell">
                            <div class="quantity">
                                <form class="quantity-form">
                                    <label class="quantity-label">
                                        <input type="number" class="quantity-input form-control"
                                               name="basket_quantity" min="1" :value="post.quantity">
                                        <div class="quantity-button quantity-down">-</div>
                                        <div class="quantity-button quantity-up">+</div>
                                    </label>
                                </form>
                            </div>
                            <div class="price">
                                <div class="price-value">
                                            <span class="font-weight-bold">
                                                 {{post.price}}
                                            </span>
                                    грн
                                </div>
                            </div>
                        </div>
                        <div class="delete-basket-item">
                            <div class="delete-icon">
                                <div class="line line--left"></div>
                                <div class="line line--right"></div>
                            </div>
                        </div>
                    </div>
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
    export default {
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