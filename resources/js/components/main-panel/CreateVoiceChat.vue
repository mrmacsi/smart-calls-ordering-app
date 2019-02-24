<template>
    <v-container grid-list-md text-xs-center row>
        <v-layout row wrap width="200px" style="height: 80vh;">
            <v-flex xs2 class="border-right step1">
                <action v-for="action in step1"
                        :action="action"></action>
                <add-button @add="onAdd"></add-button>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.steps.step2">
                <action v-for="action in step2"
                        :action="action"></action>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.steps.step3">
                <action v-for="action in step3"
                        :action="action"></action>
                <add-button @add="onAdd"></add-button>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.stepsDrinks.step3Drinks">
                <action v-for="action in step3Drinks"
                        :action="action"></action>
                <add-button @add="onAdd"></add-button>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.steps.step4">
                <action v-for="action in step4"
                        :action="action"></action>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.stepsDrinks.step4Drinks">
                <action v-for="action in step4Drinks"
                        :action="action"></action>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.steps.step5">
                <action v-for="action in step5"
                        :action="action"></action>
                <add-button @add="onAdd"></add-button>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.stepsDrinks.step5Drinks">
                <action v-for="action in step5Drinks"
                        :action="action"></action>
                <add-button @add="onAdd"></add-button>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.steps.step6">
                <action v-for="action in step6"
                        :action="action"></action>
            </v-flex>
            <v-flex xs2 class="border-right" v-if="this.$store.state.Action.stepsDrinks.step6Drinks">
                <action v-for="action in step6Drinks"
                        :action="action"></action>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
    import AddButton from "./AddButton";
    import Action from './Action'

    export default {
        name: "CreateVoiceChat",
        data() {
            return {
                step1:
                    [{
                        "id": "1",
                        "type": "talk",
                        "color": "success",
                        "title": "Welcome",
                        "text": "Welcome to Burger Store",
                        "next": "2",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }, {
                        "id": "1",
                        "type": "question",
                        "color": "error",
                        "title": "Menu",
                        "text": "Here is our menu. To order burgers press 1. To order fries press 2 and to order drinks please press 3.",
                        "next": "",
                        "extra": {"1": "Hamburgers", "2": "Fries", "3": "Drinks"},
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step2: [
                    {
                        "id": "2",
                        "type": "talk",
                        "margin": "one",
                        "title": " Burger",
                        "text": "Burger",
                        "color": "success",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    },
                    {
                        "id": "2",
                        "type": "talk",
                        "title": "Fries",
                        "text": "Fries",
                        "color": "success",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    },
                    {
                        "id": "2",
                        "type": "talk",
                        "color": "success",
                        "title": "Drink",
                        "text": "Drink",
                        "next": "",
                        "stepId": "2",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step3: [
                    {
                        "id": "3",
                        "type": "question",
                        "color": "error",
                        "stepId": "1",
                        "margin": "one",
                        "title": "Burger Type",
                        "text": "You selected burgers. For hamburgers press 1, for cheeseburgers press 2",
                        "next": "",
                        "extra": {"1": "Hamburgers", "2": "Cheeseburger"},
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step3Drinks: [
                    {
                        "id": "3",
                        "type": "question",
                        "stepId": "2",
                        "color": "error",
                        "margin": "three",
                        "title": "Drink Type",
                        "text": "You selected drinks. For Coke press 1, for Beer press 2",
                        "next": "",
                        "extra": {"1": "Coke", "2": "Beer"},
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step4: [
                    {
                        "id": "4",
                        "margin": "one",
                        "type": "talk",
                        "color": "success",
                        "title": "Hamburger",
                        "text": "Hamburger",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    },
                    {
                        "id": "4",
                        "type": "talk",
                        "color": "success",
                        "title": "Cheeseburger",
                        "text": "Cheeseburger",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step4Drinks: [
                    {
                        "id": "4",
                        "margin": "three",
                        "type": "talk",
                        "color": "success",
                        "title": "Coke",
                        "text": "Coke",
                        "next": "",
                        "stepId": "2",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    },
                    {
                        "id": "4",
                        "type": "talk",
                        "color": "success",
                        "title": "Beer",
                        "text": "Beer",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step5: [{
                    "id": "5",
                    "margin": "one",
                    "type": "input",
                    "color": "primary",
                    "title": "Hamburgers",
                    "text": "How many burgers would you like to buy?",
                    "next": "6",
                    "extra": null,
                    "created_at": "2019-02-24 07:42:44",
                    "updated_at": "2019-02-24 07:42:44"
                },
                    {
                        "id": "5",
                        "type": "question",
                        "color": "error",
                        "title": "proceed or pay",
                        "text": "That's great. if you'd like to add more items press 1 or to proceed to payment press 2",
                        "next": "",
                        "extra": {"1": "2", "2": "7"},
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step5Drinks: [{
                    "id": "5",
                    "margin": "three",
                    "type": "input",
                    "title": "Coke",
                    "color": "primary",
                    "text": "How many Coke would you like to buy?",
                    "next": "6",
                    "stepId": "2",
                    "extra": null,
                    "created_at": "2019-02-24 07:42:44",
                    "updated_at": "2019-02-24 07:42:44"
                },
                    {
                        "id": "5",
                        "type": "question",
                        "color": "error",
                        "title": "proceed or pay",
                        "stepId": "2",
                        "text": "That's great. if you'd like to add more items press 1 or to proceed to payment press 2",
                        "next": "",
                        "extra": {"1": "2", "2": "7"},
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }],
                step6: [
                    {
                        "id": "6",
                        "type": "payment",
                        "margin": "two",
                        "title": "payment",
                        "color": "normal",
                        "text": "Please check your Smart calls mobile app to make the payment and your order will be dispatched. Thanks for calling",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }
                ],
                step6Drinks: [
                    {
                        "id": "6",
                        "type": "payment",
                        "margin": "four",
                        "title": "payment",
                        "color": "normal",
                        "stepId": "2",
                        "text": "Please check your Smart calls mobile app to make the payment and your order will be dispatched. Thanks for calling",
                        "next": "",
                        "extra": null,
                        "created_at": "2019-02-24 07:42:44",
                        "updated_at": "2019-02-24 07:42:44"
                    }
                ]
            }
        },
        components: {Action, AddButton},
        computed: {},
        methods: {
            onAdd(data) {
                this.step1.push({
                    type: data.value,
                    title: data.value,
                    header: data.value,
                    text: 'example text',
                    color: data.color,
                    extra: data.value === 'question' ? ['Test Option'] : []
                })
            },
        }
    }
</script>

<style scoped lang="scss">

</style>