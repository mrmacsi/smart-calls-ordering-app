import Vue from "vue";
import Vuex from "vuex";
import MainStore from "./modules/MainStore";

Vue.use(Vuex);

const store = new Vuex.Store({
  strict: true,
  modules: {
    MainStore
  }
});

export default store;
