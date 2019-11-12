import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        basket: {
            items: [],
            amount: 0
        },
        favorite: {
            items: [],
        },
        activeModal: false,
    },

    mutations: {
        setBasket(state, items) {
            items.forEach(item => {
                state.basket.items.push(item);
            });

            localStorage.setItem('products_basket', JSON.stringify(state.basket.items));

            state.basket.amount = state.basket.items.reduce((t, i) => {
                return t + (i.price * i.quantity);
            }, 0);

        },
        setFavorite(state, items) {
            items.forEach(item => {
                state.favorite.items.push(item);
            });
            localStorage.setItem('products_favorite', JSON.stringify(state.favorite.items));
        },
        removeFavorite(state, item) {
            localStorage.removeItem('products_favorite');
            state.favorite.items = state.favorite.items.filter(i => {
                return i.id !== item.id;
            });
            localStorage.setItem('products_favorite', JSON.stringify(state.favorite.items));
        },
        showModal(state) {
            state.activeModal = !state.activeModal;
        },
    },

    actions: {
        async getBasket({commit}) {
            commit('setBasket', JSON.parse(localStorage.getItem('products_basket')));
        },

        async getFavorite({commit}) {
            commit('setFavorite', JSON.parse(localStorage.getItem('products_favorite')));
        },

        async updateBasketItem({commit, state}, item) {
            // await axios.patch(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
            await console.log('updateBasketItem')
        },

        async deleteBasketItem({commit, state}, item) {
            // await axios.delete(`/basket/${item.id}`, item).then(({data}) => commit('setBasket', data));
            await console.log('deleteBasketItem')
        },

        async deleteFavoriteItem({commit, state}, item) {
            commit('removeFavorite', item);
        },
    }
})