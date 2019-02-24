<template>
    <v-navigation-drawer app dark class="drawer-margin-top">
        <v-list>
            <v-list-tile v-for="item in items" :key="item.title" :to="{path: item.path}">
                <v-list-tile-action>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title class="text-dark font-weight-bold lighten-3">{{ item.title }}</v-list-tile-title>
                </v-list-tile-content>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        name: 'Sidebar',
        data() {
            return {
                drawer: true,
                clipped: false,
                items: [
                    { title: 'Create Voice Chat', icon: 'chat', path:'/create-voice-chat'},
                    { title: 'Events', icon: 'event', path:'/events' },
                    { title: 'Orders', icon: 'shopping_cart', path:'/orders' } ,
                    { title: 'Payments', icon: 'payment', path:'/payments'}
                ],
                right: null
            }
        },
        methods: {

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .drawer-margin-top{
        margin-top: 64px !important;
        background-color: #b7b4b4;
    }
</style>