export default {
  state: {
    lastSearch: {
      from: null,
      to: null,
    },
  },
  // For commit
  mutations: {
    setLastSearch(state, payload) {
      state.lastSearch = payload;
    },
  },
  // For dispatch
  actions: {
    setLastSearch(context, payload) {
      context.commit('setLastSearch', payload);
      localStorage.setItem('lastSearch', JSON.stringify(payload));
    },
    loadStoredState(context) {
      const lastSearch = localStorage.getItem('lastSearch');
      if (lastSearch) {
        context.commit('setLastSearch', JSON.parse(lastSearch));
      }

      const basket = localStorage.getItem('basket');
      if (basket) {
        context.commit('setBasket', JSON.parse(basket));
      }

      context.commit('setLoggedIn', isLoggedIn());
    },
  },
};
