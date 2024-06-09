import { createStore } from "vuex"

import blog from '@stores/modules/blog';

const store = createStore({
    modules: {
        blog,
    },
    state() {
        return {};
    },
    mutations: {},
    actions: {},
    getters: {},
})

export default store
