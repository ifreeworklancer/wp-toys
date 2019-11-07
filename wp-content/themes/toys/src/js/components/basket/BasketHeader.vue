<template>
    <div>
        <div class="basket-counter">{{basket.items.length}}</div>
        <div class="basket-icon">
            <svg width="20" height="20">
                <use xlink:href="#basket-icon"></use>
            </svg>
        </div>
        <div class="basket-value">
            <span class="font-weight-bold">{{basket.amount}}</span> грн
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            basket() {
                return this.$store.state.basket;
            }
        }
    }
</script>