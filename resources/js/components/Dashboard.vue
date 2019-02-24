<template>
        <v-app light>
            <navbar></navbar>
            <sidebar></sidebar>
            <contents></contents>
            <footer></footer>
        </v-app>
</template>

<script>
    import Sidebar from "./Sidebar";
    import Contents from "./Contents";
    import Navbar from "./Navbar";
    import Footer from "./Footer";

    export default {
        name: 'App',
        components: {Footer, Navbar, Contents, Sidebar},
    }
</script>
