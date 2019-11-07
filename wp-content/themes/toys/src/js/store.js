import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        basket: {
            items: [],
            amount: 0
        },
        activeModal: false,
    },

    mutations: {
        setBasket(state, items) {
            state.basket.items.push(items);
            console.log(state.basket.items);

            state.basket.amount = state.basket.items.reduce((t, i) => {
                return t + (i.price * i.quantity);
            }, 0);

        },
        showModal(state) {
            state.activeModal = !state.activeModal;
        },
    },

    actions: {
        async getBasket({commit}) {
            // await axios.get('/basket').then(({data}) => commit('setBasket', data));
            commit('setBasket', JSON.parse(localStorage.getItem('products')));
        },

        async updateBasketItem({commit, state}, item) {
            // await axios.patch(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
            await console.log('updateBasketItem')
        },

        async deleteBasketItem({commit, state}, item) {
            // await axios.delete(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
            await console.log('deleteBasketItem')
        },
    }
})