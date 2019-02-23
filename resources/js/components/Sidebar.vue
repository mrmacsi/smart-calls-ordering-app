<template>
    <v-navigation-drawer permanent clipped enable-resize-watcher app dark class="primary lighten-3">
        <v-list>
            <v-list-tile v-for="item in items" :key="title" :to="{path: item.path}">
                <v-list-tile-action>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>{{ item.title }}</v-list-tile-title>
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
                    { title: 'Answers', icon: 'dashboard', path:'/answers'},
                    { title: 'Events', icon: 'question_answer', path:'/events' },
                    { title: 'Orders', icon: 'question_answer', path:'/orders' } ,
                    { title: 'Payments', icon: 'question_answer', path:'/payments'}
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
