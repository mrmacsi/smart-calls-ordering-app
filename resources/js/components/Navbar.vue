<template>
    <v-toolbar>
        <v-icon>perm_identity</v-icon>
        <v-toolbar-title><a href="/">My Profile</a></v-toolbar-title>
        <v-spacer></v-spacer>
            <v-btn color="success">Talk</v-btn>
            <v-btn color="error">Question</v-btn>
            <v-btn color="primary">Input</v-btn>
            <v-btn style="background-color: gray" >Payment</v-btn>
            <v-btn style="background-color: darkslategrey" >SMS</v-btn>
    </v-toolbar>
</template>

<script>
    export default {
        name: "Navbar",
    }
</script>

<style scoped lang="scss">
.navbar-buttons {
    display: flex;
    flex: 1;
    justify-content: space-evenly;
}
</style>