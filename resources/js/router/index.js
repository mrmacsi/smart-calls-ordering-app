import Vue from "vue";
import VueRouter from "vue-router";

import CreateVoiceChat from "../components/main-panel/CreateVoiceChat";
import Events from "../components/main-panel/Events";
import Orders from "../components/main-panel/Orders";
import Payments from "../components/main-panel/Payments";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/create-voice-chat",
            name: "CreateVoiceChat",
            component: CreateVoiceChat,
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
