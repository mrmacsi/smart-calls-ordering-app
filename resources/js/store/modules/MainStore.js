import HttpService from "../../services/HttpService";

/**
 * Admin related actions.
 *
 * @type {{user: {}}}
 */

const state = {
  stateObj: [],
};

const getters = {
  getStateObj: state => state.stateObj,
};

const mutations = {
  setStateObj(state, data) {
    state.stateObj = data;
  }
};

const actions = {
  loadStateObj({ commit }) {
    HttpService.get().then(res => {
      commit("setStateObj", res.data);
    });
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
