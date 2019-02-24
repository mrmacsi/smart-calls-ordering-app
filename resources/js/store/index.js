import Vue from "vue";
import Vuex from "vuex";
import Action from "./modules/Action";

Vue.use(Vuex);

const store = new Vuex.Store({
  strict: true,
  modules: {
    Action
  }
});

export default store;
