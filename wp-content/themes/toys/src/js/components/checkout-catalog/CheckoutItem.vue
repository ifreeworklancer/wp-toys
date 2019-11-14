<template>
    <div class="checkout-catalog-item">
        <div class="checkout-catalog-item-cell">
            <div class="checkout-catalog-item-view">
                <figure :style="{ backgroundImage: `url('${post.image}')` }"></figure>
            </div>
            <div class="checkout-catalog-item-description">
                <h6 class="title">
                    {{post.title}}
                </h6>
            </div>
        </div>
        <div class="checkout-catalog-item-cell">
            <div class="price">
                <div class="price-value">
                    {{valueText}} <span class="font-weight-bold">{{post.quantity}}</span> шт
                </div>
            </div>
            <div class="price">
                <div class="price-value">
                    {{priceText}} <span class="font-weight-bold">{{post.price}}</span> грн
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            post: Object,
            valueText: String,
            priceText: String,
        },
        computed: {
            image() {
                return this.post.image;
            }
        },
    }
</script>