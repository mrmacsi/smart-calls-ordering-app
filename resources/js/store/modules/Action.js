

const state = {
    steps: {
        step1: false,
        step2: false,
        step3: false,
        step4: false,
        step5: false,
        step6: false,
    },
    stepsDrinks: {
        step3Drinks: false,
        step4Drinks: false,
        step5Drinks: false,
        step6Drinks: false,
    }
};


const mutations = {
    showStep(state, data) {
        state.steps[data.field] = data.state;
    },
    showStepDrinks(state, data) {
        state.stepsDrinks[data.field] = data.state;
    },
    closeSteps(state) {
        state.steps.step3 = false;
        state.steps.step4 = false;
        state.steps.step5 = false;
        state.steps.step6 = false;
    },
    closeStepsDrinks(state) {
        state.stepsDrinks.step3Drinks = false;
        state.stepsDrinks.step4Drinks = false;
        state.stepsDrinks.step5Drinks = false;
        state.stepsDrinks.step6Drinks = false;
    }

}

export default {
    state,
    mutations,
};
