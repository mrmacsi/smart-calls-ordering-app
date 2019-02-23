import Vue from "vue";
import VueRouter from "vue-router";

import Answers from "../components/main-panel/Answers";
import Events from "../components/main-panel/Events";
import Orders from "../components/main-panel/Orders";
import Payments from "../components/main-panel/Payments";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/answers",
            name: "answers",
            component: Answers,
            default: true
        },
        {
            path: "/events",
            name: "events",
            component: Events
        },
        {
            path: "/orders",
            name: "orders",
            component: Orders
        },
        {
            path: "/payments",
            name: "payments",
            component: Payments
        },
    ]
});
