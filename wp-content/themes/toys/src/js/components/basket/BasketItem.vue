<template>
    <div class="basket-item">
        <div class="basket-item-cell flex-column flex-md-row">
            <div class="basket-item-view">
                <figure :style="{ backgroundImage: `url('${item.image}')` }"></figure>
            </div>
            <div class="basket-item-description">
                <h6 class="title">
                    {{item.title}}
                </h6>
            </div>
        </div>
        <div class="basket-item-cell">
            <div class="quantity">
                <form class="quantity-form">
                    <label class="quantity-label">
                        <input type="number" class="quantity-input form-control"
                               name="basket_quantity" min="1" @input="changeQuantity" :value="quantity">
                        <div class="quantity-button quantity-down" @click="decrement">-</div>
                        <div class="quantity-button quantity-up" @click="increment">+</div>
                    </label>
                </form>
            </div>
            <div class="price">
                <div class="price-value">
                    <span class="font-weight-bold">
                        {{item.price}}
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
</template>
<script>
    export default {
        props: {
            item: Object,
        },
        data() {
            return {
                quantity: this.item.quantity,
            }
        },
        methods: {
            increment() {
                this.quantity++;
                this.item.quantity = this.quantity;
                this.$store.commit('setBasketQuantity', this.item);
            },
            decrement() {
                if (this.quantity > 1) {
                    this.quantity--;
                    this.item.quantity = this.quantity;
                    this.$store.commit('setBasketQuantity', this.item);
                } else {
                    return this.quantity;
                }
            },
            changeQuantity($event) {
                if ($event.target.value > 0) {
                    this.quantity = +$event.target.value;
                    this.item.quantity = this.quantity;
                    this.$store.commit('setBasketQuantity', this.item);
                }
            },
        },
    }

</script>
