<template>
    <v-toolbar>
        <v-icon>perm_identity</v-icon>
        <v-toolbar-title>My Profile</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items justify-space-around class="hidden-sm-and-down">
            <v-btn flat>Link One</v-btn>
            <v-btn flat>Link Two</v-btn>
            <v-btn flat>Link Three</v-btn>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>
    import {mapGetters, mapMutations, mapActions} from 'vuex'

    export default {
        name: "Navbar",
        components: {},
        props: [],
        data() {
            return {};
        },
        computed: {
            ...mapGetters([]),
        },
        methods: {
            ...mapMutations([]),
            ...mapActions([]),
        },
        created() {
        }
    }
</script>

<style scoped lang="scss">

</style>