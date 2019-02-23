<template>
        <v-app light>
            <navbar></navbar>
            <sidebar></sidebar>
            <contents></contents>
        </v-app>
</template>

<script>
    import Sidebar from "./Sidebar";
    import Contents from "./Contents";
    import Navbar from "./Navbar";

    export default {
        name: 'App',
        components: {Navbar, Contents, Sidebar},
    }
</script>
